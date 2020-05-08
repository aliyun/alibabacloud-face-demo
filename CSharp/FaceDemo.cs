using Aliyun.Acs.Core;
using Aliyun.Acs.Core.Http;
using Aliyun.Acs.Core.Profile;
using System;

namespace FaceDemo
{
    class Program
    {
        static void Main(string[] args)
        {
            // 参数设置
            string groupName = "default1";
            string person = "Wangwu1";
            string image_1 = "photo1";
            string image_2 = "photo2";
            string imageUrl_1 = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604341&di=3d6995f6dee1c4795d1827e754a00452&imgtype=0&src=http%3A%2F%2Fimg0.ph.126.net%2F90u9atgu46nnziAm1NMAGw%3D%3D%2F6631853916514183512.jpg";
            string imageUrl_2 = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604338&di=ee3d8fb39f6e14a21852a4ac3f2c5a14&imgtype=0&src=http%3A%2F%2Fc4.haibao.cn%2Fimg%2F600_0_100_0%2F1473652712.0005%2F87c7805c10e60e9a6db94f86d6014de8.jpg";
            String recognizeFaceImageUrl = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1559655604335&di=7b540d703955aed6d235752589aee34a&imgtype=0&src=http%3A%2F%2Fphotocdn.sohu.com%2F20140317%2FImg396736687.jpg";

            // DefaultProfile.getProfile的参数分别是地域，access_key_id, access_key_secret https://yq.aliyun.com/articles/693979
            IClientProfile profile = DefaultProfile.GetProfile("cn-shanghai", "${ak}", "${sk}");
            DefaultAcsClient client = new DefaultAcsClient(profile);

            Console.WriteLine("基本功能测试：");
            // 人脸检测定位
            DetectFace(client, imageUrl_1);

            Console.WriteLine("---------------------------------------");
            // 人脸属性识别
            GetFaceAttribute(client, imageUrl_1);
            // 人脸对比
            Console.WriteLine("---------------------------------------");
            VerifyFace(client, imageUrl_1, imageUrl_2);

            Console.WriteLine("1:N 功能测试：");

            //添加入两张人脸
            AddFace(client, groupName, person, image_1, imageUrl_1);
            AddFace(client, groupName, person, image_2, imageUrl_2);

            //列举Group
            ListGroup(client);

            //列举Faces
            ListFace(client, groupName);

            //人脸查询
            RecognizeFace(client, recognizeFaceImageUrl, groupName);

            //删除Face
            DeleteFace(client, groupName, person, image_1);

            //列举Faces查询删除情况
            ListFace(client, groupName);

            Console.ReadLine();

        }

        /// <summary>
        /// DetectFace API 人脸检测定位
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="imageUrl_1">检测人脸图片的URL</param>
        public static void DetectFace(DefaultAcsClient client, String imageUrl_1)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Action = "DetectFace";
            request.Version = "2018-12-03";
            request.AddBodyParameters("ImageUrl", imageUrl_1);
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// DetectFace API 人脸检测定位
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="imageUrl_1">检测人脸图片的URL</param>
        public static void GetFaceAttribute(DefaultAcsClient client, String imageUrl_1)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Action = "GetFaceAttribute";
            request.Version = "2018-12-03";
            request.AddBodyParameters("ImageUrl", imageUrl_1);
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// VerifyFace API 人脸比对
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="imageUrl_1">对比人脸图片1</param>
        /// <param name="imageUrl_2">对比人脸图片2</param>
        public static void VerifyFace(DefaultAcsClient client, String imageUrl_1, string imageUrl_2)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Action = "VerifyFace";
            request.Version = "2018-12-03";
            request.AddBodyParameters("ImageUrl1", imageUrl_1);
            request.AddBodyParameters("ImageUrl2", imageUrl_2);

            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// AddFace接口用于向人脸库中添加人脸
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="groupName">添加人脸的分组</param>
        /// <param name="person">添加人脸的姓名</param>
        /// <param name="image">添加人脸的编号</param>
        /// <param name="imageUrl">检测图片的URL</param>
        public static void AddFace(DefaultAcsClient client, string groupName, string person, string image, string imageUrl)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Version = "2018-12-03";
            request.Action = "AddFace";
            request.AddBodyParameters("Group", groupName);
            request.AddBodyParameters("Person", person);
            request.AddBodyParameters("Image", image);
            request.AddBodyParameters("ImageUrl", imageUrl);
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// DeleteFace接口用于从人脸库中删除人脸
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="groupName">删除人脸的分组</param>
        /// <param name="person">删除人脸的姓名</param>
        /// <param name="image">删除人脸的编号</param>
        public static void DeleteFace(DefaultAcsClient client, string groupName, string person, string image)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Version = "2018-12-03";
            request.Action = "DeleteFace";
            request.AddBodyParameters("Group", groupName);
            request.AddBodyParameters("Person", person);
            request.AddBodyParameters("Image", image);
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// ListFace接口用于列举注册库中的人脸
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="groupName">需要查询的库</param>
        public static void ListFace(DefaultAcsClient client, string groupName)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Version = "2018-12-03";
            request.Action = "ListFace";
            request.AddBodyParameters("Group", groupName);
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// ListGroup接口用于列举人脸组
        /// </summary>
        /// <param name="client">client对象</param>
        public static void ListGroup(DefaultAcsClient client)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Version = "2018-12-03";
            request.Action = "ListGroup";
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }

        /// <summary>
        /// RecognizeFace接口用于查找注册库中的人脸
        /// </summary>
        /// <param name="client">client对象</param>
        /// <param name="recognizeFaceImageUrl">需要查询的人类图片URL</param>
        public static void RecognizeFace(DefaultAcsClient client, string recognizeFaceImageUrl, string groupName)
        {
            CommonRequest request = new CommonRequest();
            request.Method = MethodType.POST;
            request.Domain = "face.cn-shanghai.aliyuncs.com";
            request.Version = "2018-12-03";
            request.Action = "RecognizeFace";
            request.AddBodyParameters("Group", groupName);
            request.AddBodyParameters("ImageUrl", recognizeFaceImageUrl);
            CommonResponse response = null;

            // Initiate the request and get the response
            response = client.GetCommonResponse(request);
            Console.WriteLine(response.Data);
        }
    }
}