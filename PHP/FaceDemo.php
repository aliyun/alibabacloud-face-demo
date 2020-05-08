<?php
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
require_once 'vendor\autoload.php';

// access_key_id, access_key_secret  https://yq.aliyun.com/articles/693979
AlibabaCloud::accessKeyClient("${ak}", "${sk}")->asDefaultClient();

class FaceDemo{

/**
* DetectFace API 人脸检测定位
*
* @param string $imageUrl 待检测人脸图片URL
*/
function DetectFace($imageUrl){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('DetectFace')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('ImageUrl', $imageUrl)
        ->request();

        print($result); // 输出结果
        } catch (ClientException $exception) {
            print_r($exception->getErrorMessage());
        } catch (ServerException $exception) {
            print_r($exception->getErrorMessage());
        }
    }


/**
 * GetFaceAttribute API 人脸属性识别
 *
 * @param string $imageUrl 待检测人脸图片URL
 */
function GetFaceAttribute($imageUrl){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('GetFaceAttribute')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('ImageUrl', $imageUrl)
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

/**
 * VerifyFace API 人脸对比
 *
 * @param string $imageUrl_1
 * @param string $imnageUrl_2
 */
function VerifyFace($imageUrl_1, $imageUrl_2){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('VerifyFace')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('ImageUrl1', $imageUrl_1)
        ->setQueryParameters('ImageUrl2', $imageUrl_2)
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

/**
 * AddFace接口用于向人脸库中添加人脸
 *
 * @param string $groupName 添加人脸的分组
 * @param string $person 添加人脸的姓名
 * @param string $image 添加人脸的编号
 * @param string $imageUrl 添加人脸图片的URL
 */
function AddFace($groupName, $person, $image, $imageUrl){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('AddFace')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('Group', $groupName)
        ->setQueryParameters('Person', $person)
        ->setQueryParameters('Image', $image)
        ->setQueryParameters('ImageUrl', $imageUrl)
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

/**
 * DeleteFace接口用于从人脸库中删除人脸
 *
 * @param string $groupName 删除人脸所在的分组
 * @param string $person 删除人脸的姓名
 * @param string $image 删除的人脸编号
 */
function DeleteFace($groupName, $person, $image){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('DeleteFace')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('Group', $groupName)
        ->setQueryParameters('Person', $person)
        ->setQueryParameters('Image', $image)
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

/**
 * ListFace接口用于列举注册库中的人脸
 *
 * @param string $groupName
 */
function ListFace($groupName){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('ListFace')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('Group', $groupName)
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

/**
 * ListGroup接口用于列举人脸组
 */
function ListGroup(){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('ListGroup')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

/**
 * RecognizeFace接口用于查找注册库中的人脸
 *
 * @param string $groupName 识别的组
 * @param string $recognizeFaceImageUrl 图像URL
 */
function RecognizeFace($groupName, $recognizeFaceImageUrl){
    try {
        $result = AlibabaCloud::rpc()
        ->product('FaceAPI')
        ->version('2018-12-03')
        ->action('RecognizeFace')
        ->method('POST')
        ->host('face.cn-shanghai.aliyuncs.com')
        ->regionId('cn-shanghai')
        ->setAcceptFormat('json')
        ->setQueryParameters('Group', $groupName)
        ->setQueryParameters('ImageUrl', $recognizeFaceImageUrl)
        ->request();

        print($result); // 输出结果
    } catch (ClientException $exception) {
        print_r($exception->getErrorMessage());
    } catch (ServerException $exception) {
        print_r($exception->getErrorMessage());
    }
}

}


$ClientDemo = new FaceAPIDemo;

$imageUrl_1 = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1563695836469&di=0f2344bc0c8ffbdb69ee2b7cd50972f1&imgtype=0&src=http%3A%2F%2Fwww.jd-tv.com%2Fuploads%2Fallimg%2F170926%2F30-1F926094918.jpg';
$imageUrl_2 = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604338&di=ee3d8fb39f6e14a21852a4ac3f2c5a14&imgtype=0&src=http%3A%2F%2Fc4.haibao.cn%2Fimg%2F600_0_100_0%2F1473652712.0005%2F87c7805c10e60e9a6db94f86d6014de8.jpg";
$recognizeFaceImageUrl = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604335&di=7b540d703955aed6d235752589aee34a&imgtype=0&src=http%3A%2F%2Fphotocdn.sohu.com%2F20140317%2FImg396736687.jpg";

$groupName = "phpGroup";
$person = "Lisi1";
$image_1 = "photo1";
$image_2 = "photo2";

// print('Base function Demo');
echo 'Base function Demo<br>';
$ClientDemo->DetectFace($imageUrl_1);
echo '<br>------------------------------------------<br>';
$ClientDemo->GetFaceAttribute($imageUrl_2);
echo '<br>------------------------------------------<br>';
$ClientDemo->VerifyFace($imageUrl_1, $imageUrl_2);
echo '<br>------------------------------------------<br>';
echo '1:N function Demo<br>';

$ClientDemo->AddFace($groupName, $person, $image_1, $imageUrl_1);
$ClientDemo->AddFace($groupName, $person, $image_2, $imageUrl_2);
echo '<br>------------------------------------------<br>';

$ClientDemo->ListFace($groupName);
echo '<br>------------------------------------------<br>';

$ClientDemo->ListGroup();
echo '<br>------------------------------------------<br>';

$ClientDemo->RecognizeFace($groupName, $recognizeFaceImageUrl);
echo '<br>------------------------------------------<br>';

$ClientDemo->DeleteFace($groupName, $person, $image_1);
echo '<br>------------------------------------------<br>';

$ClientDemo->ListFace($groupName);
?>