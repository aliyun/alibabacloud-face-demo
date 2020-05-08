var RPCClient = require('@alicloud/pop-core').RPCClient;

// access_key_id, access_key_secret https://yq.aliyun.com/articles/693979
var client = new RPCClient({
  accessKeyId: '${ak}',
  accessKeySecret: '${sk}',
  endpoint: 'https://face.cn-shanghai.aliyuncs.com',
  apiVersion: '2018-12-03'
});

 // DetectFace API 人脸检测定位
function DetectFace(ImageUrl_1)
{
    var params = {'ImageUrl':ImageUrl_1};
    var action = 'DetectFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}

 // GetFaceAttribute API 人脸属性识别
function GetFaceAttribute(ImageUrl_1)
{
    var params = {'ImageUrl':ImageUrl_1};
    var action = 'GetFaceAttribute';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}

 // GetFaceAttribute API 人脸属性识别
function VerifyFace(ImageUrl_1, ImageUrl_2)
{
    var params = {'ImageUrl1':ImageUrl_1, 'ImageUrl2':ImageUrl_2};
    var action = 'VerifyFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}


 // VerifyFace API 人脸比对
function VerifyFace(ImageUrl_1,ImageUrl_2)
{
    var params = {'ImageUrl1':ImageUrl_1, 'ImageUrl2':ImageUrl_2};
    var action = 'VerifyFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}



 // AddFace接口用于向人脸库中添加人脸
function AddFace(groupName, person, image, imageUrl)
{
    var params = {'Group':groupName, 'Person':person, 'image':image, 'imageUrl':imageUrl};
    var action = 'AddFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}


 // DeleteFace接口用于从人脸库中删除人脸
function DeleteFace(groupName, person, image)
{
    var params = {'Group':groupName, 'Person':person, 'Image':image};
    var action = 'DeleteFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}

 // ListFace接口用于列举注册库中的人脸
function ListFace(groupName)
{
    var params = {'Group':groupName};
    var action = 'ListFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}

 // ListGroup接口用于列举人脸组
function ListGroup()
{
    var params = {};
    var action = 'ListGroup';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}

 // RecognizeFace接口用于查找注册库中的人脸
function RecognizeFace(recognizeFaceImageUrl, groupName)
{
    var params = {'Group':groupName, 'ImageUrl':recognizeFaceImageUrl};
    var action = 'RecognizeFace';
    var requestOption = {
        method: 'POST'
    }

    client.request(action, params, requestOption).then((result) => {
    console.log(JSON.stringify(result));
    }, (ex) => {
    console.log(ex);
    })
}


// 参数设置
var image = new Object();
image.imageUrl_1 = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604341&di=3d6995f6dee1c4795d1827e754a00452&imgtype=0&src=http%3A%2F%2Fimg0.ph.126.net%2F90u9atgu46nnziAm1NMAGw%3D%3D%2F6631853916514183512.jpg';
image.imageUrl_2 = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604338&di=ee3d8fb39f6e14a21852a4ac3f2c5a14&imgtype=0&src=http%3A%2F%2Fc4.haibao.cn%2Fimg%2F600_0_100_0%2F1473652712.0005%2F87c7805c10e60e9a6db94f86d6014de8.jpg';
image.groupName = 'defaultjsdemo';
image.person = 'ZhangShan1';
image.image_1 = 'photo1';
image.image_2 = 'photo2';
image.recognizeFaceImageUrl = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604335&di=7b540d703955aed6d235752589aee34a&imgtype=0&src=http%3A%2F%2Fphotocdn.sohu.com%2F20140317%2FImg396736687.jpg';


// 基础方法测试
DetectFace(image.imageUrl_1);
GetFaceAttribute(image.imageUrl_2);
VerifyFace(image.imageUrl_1, image.imageUrl_2);

// 1：N方法测试
//添加入两张人脸
AddFace(image.groupName, image.person, image.image_1, image.imageUrl_1);
AddFace(image.groupName, image.person, image.image_2, image.imageUrl_2);

//列举Group
ListGroup();

//列举Faces
ListFace(image.groupName);

//人脸查询
RecognizeFace(image.recognizeFaceImageUrl, image.groupName);

//删除Face
DeleteFace(image.groupName, image.person, image.image_1)

//列举Faces查询删除情况
ListFace(image.groupName)