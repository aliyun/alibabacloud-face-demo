package com.alibaba.gts.face;

import com.aliyuncs.CommonRequest;
import com.aliyuncs.CommonResponse;
import com.aliyuncs.DefaultAcsClient;
import com.aliyuncs.exceptions.ClientException;
import com.aliyuncs.http.MethodType;
import com.aliyuncs.profile.DefaultProfile;

public class FaceDemo {

    //DefaultProfile.getProfile的参数分别是地域，access_key_id, access_key_secret   https://yq.aliyun.com/articles/693979
    public static DefaultProfile profile = DefaultProfile.getProfile("cn-shanghai", "${ak}", "${sk}");
    public static DefaultAcsClient client = new DefaultAcsClient(profile);

    public static void main(String[] args) throws ClientException {
        String imageUrl_1 = "${url_1}";
        String imageUrl_2 = "${url_2}";

        // 人脸检测定位
        DetectFace(imageUrl_1);
        // 人脸属性识别
        GetFaceAttribute(imageUrl_1);
        // 人脸对比
        VerifyFace(imageUrl_1,imageUrl_2);

        // 1:N 查找功能测试

        String groupName = "${group_name}";
        String person = "${person_name}";
        String image_1 = "photo1";
        String image_2 = "photo2";
        String recognizeFaceImageUrl = "${recognize_face_url}";

        //添加入两张人脸
        AddFace(groupName,person,image_1,imageUrl_1);
        AddFace(groupName,person,image_2,imageUrl_2);

        //列举Group
        ListGroup();

        //列举Faces
        ListFace(groupName);

        //人脸查询
        RecognizeFace(recognizeFaceImageUrl, groupName);

        //删除Face
        DeleteFace(groupName,person,image_1);

        //列举Faces查询删除情况
        ListFace(groupName);
    }

    /**
     * DetectFace API 人脸检测定位
     *
     * @param imageUrl  检测人脸图片的URL
     */
    public static void DetectFace(String imageUrl) {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("DetectFace");
        request.putBodyParameter("ImageUrl", imageUrl);
//        request.putBodyParameter("Content", "/9j/4AAQSkZJRgABA...");  //检测图片的内容，Base64编码
        CommonResponse response = null;
        try {
            response = client.getCommonResponse(request);
        } catch (ClientException e) {
            e.printStackTrace();
        }
        System.out.println(response.getData());
    }

    /**
     * GetFaceAttribute API 人脸属性识别
     *
     * @param imageUrl  检测人脸图片的URL
     */
    public static void GetFaceAttribute(String imageUrl) {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("GetFaceAttribute");
        request.putBodyParameter("ImageUrl", imageUrl);
//        request.putBodyParameter("Content", "/9j/4AAQSkZJRgABA...");  //检测图片的内容，Base64编码
        CommonResponse response = null;
        try {
            response = client.getCommonResponse(request);
        } catch (ClientException e) {
            e.printStackTrace();
        }
        System.out.println(response.getData());
    }

    /**
     * VerifyFace API 人脸比对
     *
     * @param imageUrl_1 对比人脸图片1
     * @param imageUrl_2 对比人脸图片2
     */
    public static void VerifyFace(String imageUrl_1, String imageUrl_2) {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("VerifyFace");
        request.putBodyParameter("ImageUrl1", imageUrl_1);
        request.putBodyParameter("ImageUrl2", imageUrl_2);
//        request.putBodyParameter("Content", "/9j/4AAQSkZJRgABA...");  //检测图片的内容，Base64编码
        CommonResponse response = null;
        try {
            response = client.getCommonResponse(request);
        } catch (ClientException e) {
            e.printStackTrace();
        }
        System.out.println(response.getData());
    }

    /**
     * AddFace接口用于向人脸库中添加人脸
     * @param groupName 添加人脸的分组
     * @param person 添加人脸的姓名
     * @param image 添加人脸的编号
     * @param imageUrl 检测图片的URL
     */
    public static void AddFace(String groupName,String person,String image,String imageUrl)
    {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("AddFace");
        request.putBodyParameter("Group", groupName);
        request.putBodyParameter("Person", person);
        request.putBodyParameter("Image", image);
        request.putBodyParameter("ImageUrl",imageUrl);
//        request.putBodyParameter("Content", "/9j/4AAQSkZJRgABA...");  //检测图片的内容，Base64编码
        CommonResponse response = null;
        try {
            response = client.getCommonResponse(request);
        } catch (ClientException e) {
            e.printStackTrace();
        }
        System.out.println(response.getData());
    }

    /**
     * DeleteFace接口用于从人脸库中删除人脸
     * @param groupName 添加人脸的分组
     * @param person 添加人脸的姓名
     * @param image 添加人脸的编号
     * @throws ClientException
     */
    public static void DeleteFace(String groupName,String person,String image) throws ClientException {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("DeleteFace");
        request.putBodyParameter("Group", groupName);
        request.putBodyParameter("Person", person);
        request.putBodyParameter("Image", image);
        CommonResponse response = client.getCommonResponse(request);
        System.out.println(response.getData());
    }

    /**
     * ListFace接口用于列举注册库中的人脸
     * @param groupName 需要查询的库
     * @throws ClientException
     */
    public static void ListFace(String groupName) throws ClientException {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("ListFace");
        request.putBodyParameter("Group", groupName);
        CommonResponse response = client.getCommonResponse(request);
        System.out.println(response.getData());
    }

    /**
     * ListGroup接口用于列举人脸组
     * @throws ClientException
     */
    public static void ListGroup() throws ClientException {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("ListGroup");
        CommonResponse response = client.getCommonResponse(request);
        System.out.println(response.getData());
    }

    /**
     * RecognizeFace接口用于查找注册库中的人脸
     * @param recognizeFaceImageUrl 需要查询的人类图片URL
     * @throws ClientException
     */
    public static void RecognizeFace(String recognizeFaceImageUrl, String groupName) throws ClientException {
        CommonRequest request = new CommonRequest();
        request.setSysMethod(MethodType.POST);
        request.setSysDomain("face.cn-shanghai.aliyuncs.com");
        request.setSysVersion("2018-12-03");
        request.setSysAction("RecognizeFace");
        request.putBodyParameter("Group", groupName);
        request.putBodyParameter("ImageUrl", recognizeFaceImageUrl);
//        request.putBodyParameter("Content", "/9j/4AAQSkZJRgABA...");  //检测图片的内容，Base64编码
        CommonResponse response = client.getCommonResponse(request);
        System.out.println(response.getData());
    }
}