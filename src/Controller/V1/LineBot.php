<?php


namespace App\Controller\V1;


use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LineBotController extends AbstractController
{
    public function index()
    {
        DEFINE("ACCESS_TOKEN",getenv('ACCESS_TOKEN'));
        DEFINE("SECRET_TOKEN",getenv('SECRET_TOKEN'));

        //LINESDKの読み込み
        require_once(__DIR__ . "/vendor/autoload.php");

        //LINEから送られてきたらtrueになる
        if (isset($_SERVER["HTTP_" . HTTPHeader::LINE_SIGNATURE])) {

            //LINEBOTにPOSTで送られてきた生データの取得
            $InputData = file_get_contents("php://input");

            //LINEBOTSDKの設定
            $HttpClient = new CurlHTTPClient(ACCESS_TOKEN);
            $Bot = new LINEBot($HttpClient, ['channelSecret' => SECRET_TOKEN]);
            $Signature = $_SERVER["HTTP_" . HTTPHeader::LINE_SIGNATURE];
            $Events = $Bot->parseEventRequest($InputData, $Signature);

            //大量にメッセージが送られると複数分のデータが同時に送られてくるため、foreachをしている。
            foreach($Events as $event){
                $SendMessage = new MultiMessageBuilder();
                $TextMessageBuilder = new TextMessageBuilder("よろぽん！");
                $SendMessage->add($TextMessageBuilder);
                $Bot->replyMessage($event->getReplyToken(), $SendMessage);
            }
        }
    }

}
