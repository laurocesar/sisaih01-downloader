<?php 

class SISAIHDownloader{

    const FTP_SERVER = 'ftp2.datasus.gov.br';
    const FTP_USER = 'anonymous';
    const FTP_PASSWORD = '';
    const FTP_FILE = '/public/sistemas/dsweb/SIHD/Programas/sisaih01_leiame.txt';
    const LOCAL_FILE = 'php://output';
    
    const FULL_URL = 'ftp://' . self::FTP_SERVER . self::FTP_FILE;
    
    
    public function getRemoteContent(): string{
        $content = self::download();
        
        $content = self::regex($content);
        
        return $content;
    }
    
    /**
     * Return first block of changes 
     */
    private function regex(string $content): string {
        //all before        
        $before = strstr($content,'----------------------------------------------------', true);  // fullstring when no delimiter is found
        
        // all after
        $prefix = "***************************************************";
        
        $index = strrpos($before, $prefix) + strlen($prefix);
        $result = substr($before, $index);
        
        return $result;
    }
    
    /**
     * Donwload using wget
     * @return string
     */
    private function download(): string{
        exec('wget -O - ftp://' . self::FTP_SERVER . self::FTP_FILE, $array);
        
        $data = implode('<br>', $array);
        
        return mb_convert_encoding($data, 'UTF-8');
    }
    
    /**
     * Donwload using fle_get_contents
     * @return string
     */
    private function downloadFileGetContents(): string{
        $data = file_get_contents('ftp://' . self::FTP_SERVER . self::FTP_FILE  );
        
        return mb_convert_encoding($data, 'UTF-8');
        
    }
    
    /**
     * Download from FTP
     * @return string
     */
    private function downloadFTP(): string{
        // set up basic connection
        $conn_id = ftp_connect(self::FTP_SERVER);
        
        if (!$conn_id){
            throw new ErrorException("Could not connect to ".self::FTP_SERVER);
        }
        
        // login with username and password
        $login_result = ftp_login($conn_id, self::FTP_USER, self::FTP_PASSWORD);
        
        if (!$login_result){
            throw new ErrorException("Couldn't login as ".self::FTP_USER);
        }
        
        // passive mode
        ftp_set_option($conn_id, FTP_USEPASVADDRESS, false);
        ftp_pasv($conn_id, true);
        
        // options
        ftp_raw($conn_id, 'OPTS UTF8 ON');
        
        // try to download $server_file and save to $local_file
        $data = '';
        ob_start();
        $result = ftp_get($conn_id, self::LOCAL_FILE, self::FTP_FILE, FTP_BINARY);
        $data = ob_get_contents();
        ob_end_clean();
        
        if (!$result){
            throw new ErrorException("There was a problem when getting contents");
        }
        
        // close the connection
        ftp_close($conn_id);
        
        return mb_convert_encoding($data, 'UTF-8');
    }
    
}

?>