<HTML>
<HEAD>
<TITLE>Titulo da página</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

class mensageiro
{

    public function selecionarFrase(){
        $frases[]= 'Sonhos existem para serem realizados, por isso não olhe para trás nem escute palavras de desânimo!';
        $frases[]= 'Assim como os pássaros, precisamos aprender a superar os desafios que nos são apresentados, para alçarmos voos mais altos.';
        $frases[]= 'Já experimentou acreditar em você? Tente! Você não faz ideia do que é capaz.';
        $frases[]= 'A vida tanto lhe pode dar o melhor como o pior, mas é você quem escolhe aquilo que vai permanecer ou ficar para trás.';
        $frases[]= 'O poder está dentro de você, na sua mente, pois se acreditar que consegue não haverá obstáculo capaz de impedir o seu sucesso.';
        $frases[]= 'Nunca é tarde demais para ser aquilo que sempre desejou ser.';
        $frases[]= 'Aquilo que você está vivendo, o peso que você está carregando, não é nada comparado à alegria que está esperando por você!';
        $frases[]= 'Teste os seus limites, enfrente os seus medos e não deixe que nada impeça você de pelo menos tentar!';
        $frases[]= 'Tudo que você precisa para começar a realizar seus sonhos é confiar em você, e lutar sem ter medo de falhar.';
        $frases[]= 'Você não verá qualquer tipo de dificuldade à sua frente se mantiver seu olhar focado nos objetivos que deseja realmente conquistar!';
        $frases[]= 'A melhor maneira de melhorar o padrão de vida está em melhorar o padrão de pensamento.';
        $frases[]= 'Serei sempre otimista, pois acreditar é o primeiro passo para fazer acontecer!';
        $frases[]= 'Aquele que tentou e não conseguiu, é superior àquele que não tentou.';
        $frases[]= 'Não há vergonha em cair, mas sim em não se levantar; não desista, pois as quedas também fortalecem e ensinam!';
        $frases[]= 'Façamos da interrupção um caminho novo. Da queda um passo de dança, do medo uma escada, do sonho uma ponte, da procura um encontro!';

        $indice = rand(0,14);
        return $frases[$indice];
    }

    public function selecionarToken(){

        $token[]='2dZ8NGBIAOfNwiR9WG38LilEHEPwQmSRJgP3AModD9b4YRZlJ8c1QOjnpti3l7xCoxtwhW';
        $token[]='N95Vu1wB5rRkyVqe0uuNBut0jL5mMk7XhbLiKS7iNnsYRVSzdg0TK9CVPlsQfleNQGf5eT';
        $token[]='3VGWwMcU6Ff6N0Z7DTpABv71nRVHjJzRfxUaEQdQFEK1SXbgpmU3IRooTz0pCKTfw2m2iB';
        $indice_token = rand(0,2);
        return $token[$indice_token];
    }

    public function selecionarTelefone(){

        $tel[]='5562984212678';
        $tel[]='5562981618144';
        $tel[]='5562981317373';
        $tel[]='5562991696173';
        $tel[]='5562982513300';
        $tel[]='5562981389268';
        $indice_tel = rand(0,5);
        return $tel[$indice_tel];
    }

    public function enviarMensagem($mensagem, $token, $tel){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://zapito.com.br/api/bots/transactional/send?format=json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYPEER=> 0,
            CURLOPT_SSL_VERIFYHOST=> 0,

            CURLOPT_POSTFIELDS => json_encode([
                "phone"=> $tel,
                "message"=> $mensagem
            ]),

            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                'Content-Type: application/json',
                "postman-token: 5f58fdb3-1845-45d9-4dbd-360496079c3d",
                "x-bot-secret: $token"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
    
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}

$obj = new mensageiro;
$mensagem = $obj->selecionarFrase();
$token = $obj->selecionarToken();
$tel= $obj->selecionarTelefone();

var_dump($obj->enviarMensagem($mensagem, $token, $tel));

?>