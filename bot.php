<?php
error_reporting(0);
class module {
    public function curl($url,$httpheader=0,$post=0){ 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    if($httpheader){
    curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_HEADER, true);
    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch);
    if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
    $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
    curl_close($ch);
    return array($header, $body);}
    }
    function controlc($url){
        $headers = array();
        $headers[] = "Mozilla/5.0 (Linux; Android 8.1.0; Redmi 6A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Mobile Safari/537.36";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $res = curl_exec($ch);
        return $res;
    }

    public function an($str){
    $arr = str_split($str);
    foreach ($arr as $az){
    echo $az;
    usleep(4000);}
    }
    
    public function timer($tmr){
    $hijaut = "\e[1;32m";
    $meraht = "\e[1;31m";
    $kuningt = "\e[1;33m";
    $putiht = "\e[1;37m";
    $birut = "\e[1;34m";
    $ungut = "\e[1;35m";
    $birumudat = "\e[1;36m";
    $warna = [$ungut,$birumudat,$hijaut,$ungut,$birut];
    $timr=time()+$tmr;
    while(true):
    echo "\r                           \r";
    $res = $timr-time();
    if($res < 1){
    break;
    }
    echo $putiht."[".$warna[array_rand($warna)]."•••".$putiht."] ".gmdate("H:i:s", $res);
    sleep(1);
    endwhile;
    }
    
    public function bypassv2($siteurl,$sitekey,$apikey){
    $url1="https://api.anycaptcha.com/createTask";
    $ua=array("Host: api.anycaptcha.com","Content-Type: application/json");
    $data1=json_encode(array("clientKey"=>$apikey,"task"=>array("type"=>"RecaptchaV2TaskProxyless","websiteURL"=>$siteurl,"websiteKey"=>$sitekey)));
    $create=json_decode($this->curl($url1,$ua,$data1));
    if($create->errorId == '1'){
    return 0;
    }else{
    $task=$create->taskId;
         while(true){
         $url2="https://api.anycaptcha.com/getTaskResult";
         $data2=json_encode(array("clientKey"=>$apikey,"taskId"=>$task));
         $res=json_decode($this->curl($url2,$ua,$data2));
         if($res->status=='ready'){
         return $res->solution->gRecaptchaResponse;
         }elseif($res->status=='processing'){
         sleep(3);
         }else{
         return 0;
         break;
         }}}}
         
    public function banner($script,$version){
    $green = "\e[1;32m";
    $blue = "\e[1;34m";
    $red = "\e[1;31m";
    $white = "\33[37;1m";
    $yellow = "\e[1;33m";
    $cyan = "\e[1;36m";
    $purple = "\e[1;35m";
    $gray = "\033[0;90m";
    system('clear');
    $this->an("{$gray}══════════════════════════════════════════════════\n");
    $this->an("                 {$red}「{$purple}ジュンさん{$red}」\n");
    $this->an("{$gray}══════════════════════════════════════════════════\n");
    $this->an("{$white}TELEGRAM ⇒ {$cyan}@MrJinxxx\n");
    $this->an("{$red}PARTNER : {$purple}@ItsMeXan \n");
    $this->an("{$red}SCRIPT  : {$green}{$script}\n");
    $this->an("{$red}VERSI   : {$green}{$version} \n");
    $this->an("{$red}Support : {$green}X-Jowo Friends , All-Team-Function\n");
    $this->an("{$gray}══════════════════════════════════════════════════\n");}
    
    public function password($url){
        $res = $this->controlc("{$url}");
        $link1 = explode('Link Password: ',$res);
        $link = explode(' ',$link1[1]);
        $pw1 = explode('Pass: ',$res);
        $pw = explode(' ',$pw1[1]);
        $pass = $pw[0];
        $read = file_get_contents("key.txt");
        system('clear');
        if ($pass == 'offline'){
              echo $this->color('red')." ◼ Script Sudah Di Off Kan\n";
              exit;                                                       }else{
        if($read == $pass){
          system('clear');
        }elseif($read != $pass){
      //echo $putih." •Jangan di skip videonya. anggap aja nonton film Jav\n\n";
           $this->an($this->color('red')."\n\n\n  ─".$this->color('gray')."────────────────────────────────────────".$this->color('red')."─\n");
           $this->an($this->color('white')."  Script ini memiliki Pass untuk login\n");
           $this->an($this->color('white')."  salin ".$this->color('purple').$link[0]."\n");
           $this->an($this->color('white')."  dan paste ke google untuk menuju ke\n");
           $this->an($this->color('white')."  halaman key yang sudah di sediakan\n");
           $this->an($this->color('white')."  key akan berubah kapanpun\n\n");
           $this->an($this->color('green')."                                  @MrJnxxx\n");
           $this->an($this->color('red')."  ─".$this->color('gray')."────────────────────────────────────────".$this->color('red')."─\n\n\n");
          $save = fopen("key.txt", "w");
          $p = readline($this->color('red').'> '.$this->color('green').'Password : '.$this->color('white'));
    if($pass == $p){
            fwrite($save, $p);
            echo $this->color('red')."\n•~".$this->color('green')." Password benar👍\n";
            fclose($save);
            sleep(2);
            system('clear');
            sleep(5);
            echo$this->color('green')."Please subscribe my ".$this->color('red')."YouTube".$this->color('green')." channel".$this->color('white')." :)\n";
            sleep(3);
            system('termux-open-url https://www.youtube.com/channel/UCJ_vQaUU0CKuPpOji6IiUwQ');
            sleep(10);
            echo$this->color('yellow')."Thanks ".$this->color('red')."for ".$this->color('cyan')."subscribe\n";
            sleep(4);
            system('clear');
        }else{
            echo $this->color('red')." LOGIN GAGAL, MASUKKAN PASSWORD YANG BENAR\n";
            exit;
        }
        }
        }
    }
    public function ant_vpn(){
        $sistemm=shell_exec('2>/dev/null ifconfig');
        if(preg_match('/tun0/i',$sistemm)){
            echo self::color('red')."sorry cuk,gabisa pake vpn\n";
            exit;
        }
    }
    public function color($str){
    $color=array('green'=>"\e[1;32m",'blue'=>"\e[1;34m",'red'=>"\e[1;31m",'white'=>"\33[37;1m",'yellow'=>"\e[1;33m",'cyan'=>"\e[1;36m",'purple'=>"\e[1;35m",'gray'=>"\033[0;90m");
    return $color[$str];}
}
class bot extends module{
    public function __construct(){
        global $useragent,$cookie,$token,$sid,$keyy,$tokens,$image3;
        #self::password('https://controlc.com/60cef2b6');
        if(file_exists('useragent')){
            $useragent=file_get_contents("useragent");
        }else{
            $useragent=readline('Input useragent: ');
            file_put_contents('useragent',$useragent);
        }
        if(file_exists('cookie')){
            $cookie=file_get_contents('cookie');
        }else{
            $cookie=readline('Input cookie: ');
            file_put_contents('cookie',$cookie);
        }
        system('clear');
        $db=$this->db()[1];
        $usr=explode('</font><br />',explode('<font class="text-success">',$db)[1])[0];
        $bal=explode('</b></div></div>',explode('Account Balance <div class="text-primary"><b>',$db)[1])[0];
        if($usr <= null){
            echo self::color('red')."Cookie Dead\n";
            unlink("cookie");
            exit;
        }else{
            self::banner("WinBits","1.0");
            echo self::color('red')."1".self::color('white').".Faucet\n";
            echo self::color('red')."1".self::color('white').".PTC\n";
            $menu = readline(self::color('green').'Input menu: '.self::color('white'));
            self::an(self::color('gray')."══════════════════════════════════════════════════\n");
            if($menu == "1"){
                self::an(self::color('white')."Welcome {$usr}\n");
                self::an(self::color('red')."~> ".self::color('cyan')."{$bal}\n\n");
                while("true"){
                    $fa=$this->db()[1];
                    $token=explode("';",explode("var token = '",$fa)[1])[0];
                    $claim=$this->ver()[1];
                    $res=explode('<\/div>',explode('<div class=\"alert alert-success\" role=\"alert\"><i class=\"fa fa-check-circle fa-fw\"><\/i> Congratulations, your lucky ',$claim)[1])[0];
                    if(!$res==""){
                        self::an(self::color('white')."Congratulations, your lucky ".$res."\n");
                        self::timer(240);
                    }else{
                        self::an(self::color('red')."Invalid Claim\n");
                        self::timer(240);
                    }
                }
            }elseif($menu == "2"){
                self::an(self::color('white')."Welcome {$usr}\n");
                self::an(self::color('red')."~> ".self::color('cyan')."{$bal}\n\n");
                while("true"){
                    $ptc=$this->ptc()[1];
                    $sid=explode('">',explode('<div class="website_block" id="',$ptc)[1])[0];
                    $key=explode("', b);",explode("childWindow = open(base + '/surf.php?sid=' + a + '&key=",$ptc)[1])[0];
                    if($sid <= null){
                        echo self::color('red')."Ads Ptc Habis Silahkan Run Fitur Faucet\n";
                    }else{
                        $view=$this->view()[1];
                        $tokens=explode("';",explode("var token = '",$view)[1])[0];
                        $time=explode(';',explode('var secs = ',$view)[1])[0];
                        self::timer($time);
                        baleni:
                            $cap=$this->cap()[1];
                            $img = explode('"',$cap);
                            $img1 = explode('",',$img[1]);
                            $img2 = explode('",',$img[3]);
                            $img3 = explode('",',$img[5]);
                            $img4 = explode('",',$img[7]);
                            $img5 = explode('",',$img[9]);
                            $image1=$img1[0];
                            $image2=$img2[0];
                            $image3=$img3[0];
                            $image4=$img4[0];
                            $image5=$img5[0];
                            $input=$this->input()[0];
                            $if=explode('expires:',explode('HTTP/2 ',$input)[1])[0];
                            if($if == "200"){
                                $veer=$this->verptc()[1];
                                $mes=explode('<\/div>"',explode('<b>SUCCESS<\/b> ',$veer)[1])[0];
                                self::an(self::color('white')."{$mes}\n");
                            }else{
                                goto baleni;
                            }
                    }
                }
            }else{
                echo self::color('red')."Invalid Menu\n";
                exit;
            }
        }
    }
    public function head(){
        global $useragent,$cookie;
        return array("user-agent: ".$useragent,"cookie: ".$cookie);
    }
    public function db(){
        return self::curl('https://www.winbits.xyz/',$this->head());
    }
    public function ver(){
        global $token;
        return self::curl('https://www.winbits.xyz/system/ajax.php',$this->head(),"a=getFaucet&token={$token}&challenge=false&response=false");
    }
    public function headptc(){
        global $useragent,$cookie,$sid,$keyy;
        $ua = array();
        $ua[]="user-agent: ".$useragent;
        $ua[]="cookie: ".$cookie;
        $ua[]="Referer: https://www.winbits.xyz/surf.php?sid=$sid&key=$key";
        $ua[]="X-Requested-With: XMLHttpRequest";
        return $ua;
    }
    public function ptc(){
        return self::curl('https://www.winbits.xyz/ptc.html',$this->head());
    }
    public function view(){
        global $sid,$keyy;
        return self::curl("https://www.winbits.xyz/surf.php?sid={$sid}&key={$keyy}",$this->head());
    }
    public function cap(){
        return self::curl('https://www.winbits.xyz/system/libs/captcha/request.php',$this->headptc(),"cID=0&rT=1&tM=light");
    }
    public function input(){
        global $image3;
        return self::curl('https://www.winbits.xyz/system/libs/captcha/request.php',$this->headptc(),"cID=0&pC={$image3}&rT=2");
    }
    public function verptc(){
        global $sid,$tokens,$image3;
        return self::curl('https://www.winbits.xyz/system/ajax.php',$this->headptc(),"a=proccessPTC&data={$sid}&token={$tokens}&captcha-idhf=0&captcha-hf={$image3}");
    }
}
(new bot);