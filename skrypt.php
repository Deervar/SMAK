 if (isset($_POST['wyslano'])) 
        {
            $pancerz = 5;
            for ($zycie_szczura=10; $zycie_szczura >= 0 ;)
            {  
                
                $sila = rand(1,8);
                echo "Siła uderzenia ".$sila. " pkt.<br>";

                if($sila>$pancerz)
                {
               
                $uderzenie=$sila-$pancerz;
                for ($pancerz=5; $pancerz>=0;)
                {
                    $pancerz = $pancerz - $uderzenie;

                }
               
                $zycie_szczura=$zycie_szczura-$uderzenie;
                

                if ($zycie_szczura<=0) echo "Zgon ";
                else echo "Trafiłeś szczura. Dostaje".$uderzenie." pkt obrażen.<br> Pozostałe życie szczura".$zycie_szczura.".Pancerz ".$pancerz." pkt. Walcz dalej.<br>";
                 
                }
                else
                {
                    echo "Unik... <br>";
                }
            }
        }