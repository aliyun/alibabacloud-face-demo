from aliyunsdkcore.client import AcsClient
from aliyunsdkcore.request import CommonRequest

# access_key_id, access_key_secret  https://yq.aliyun.com/articles/693979
client = AcsClient("${ak}", "${sk}", "cn-shanghai")

# DetectFace API 人脸检测定位
def DetectFace(imageUrl_1:"待检测图片URL"):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_action_name("DetectFace")
    request.set_version("2018-12-03")
    request.set_accept_format('json')
    request.add_body_params("ImageUrl", imageUrl_1)
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str) # 打印输出结果

# VerifyFace API 人脸对比
def VerifyFace(imageUrl_1:"待对比的图片URL_1", imageUrl_2:"待对比的图片URL_2"):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_action_name("VerifyFace")
    request.set_version("2018-12-03")
    request.set_accept_format('json')
    request.add_body_params("ImageUrl1", imageUrl_1)
    request.add_body_params("ImageUrl2", imageUrl_2)
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str) # 打印输出结果

# GetFaceAttribute API 人脸属性识别
def GetFaceAttribute(imageUrl_1:"待检测图片URL"):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_action_name("GetFaceAttribute")
    request.set_version("2018-12-03")
    request.set_accept_format('json')  # 设置返回的结果
    request.add_body_params("ImageUrl", imageUrl_1)
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果


# AddFace接口用于向人脸库中添加人脸
def AddFace(groupName:"添加人脸的分组", person:"添加人脸的姓名", image:"添加人脸的编号", imageUrl:"添加人脸图片的URL"):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_version("2018-12-03")
    request.set_action_name("AddFace")
    request.add_body_params("Group", groupName)
    request.add_body_params("Person", person)
    request.add_body_params("Image", image)
    request.set_accept_format('json')  # 设置返回的结果
    request.add_body_params("ImageUrl", imageUrl)
    # request.putBodyParameter("Content", "/9j/4AAQSkZJRgABA...");  //检测图片的内容，Base64编码
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果


# DeleteFace接口用于从人脸库中删除人脸
def DeleteFace(groupName:"添加人脸的分组", person:"添加人脸的姓名", image:"添加人脸的编号"):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_version("2018-12-03")
    request.set_action_name("DeleteFace")
    request.add_body_params("Group", groupName)
    request.add_body_params("Person", person)
    request.add_body_params("Image", image)
    request.set_accept_format('json')  # 设置返回的结果
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果


# ListFace接口用于列举注册库中的人脸
def ListFace(groupName:"需要查询的库"):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_version("2018-12-03")
    request.set_action_name("ListFace")
    request.add_body_params("Group", groupName)
    request.set_accept_format('json')  # 设置返回的结果
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果

# ListGroup接口用于列举人脸组
def ListGroup():
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_version("2018-12-03")
    request.set_action_name("ListGroup")
    request.set_accept_format('json')  # 设置返回的结果
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果

# RecognizeFace接口用于查找注册库中的人脸
def RecognizeFace(recognizeFaceImageUrl, groupName):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_version("2018-12-03")
    request.set_action_name("RecognizeFace")
    request.add_body_params("Group", groupName)
    request.add_body_params("ImageUrl", recognizeFaceImageUrl)
    request.set_accept_format('json')  # 设置返回的结果
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果

if __name__ == '__main__':
    groupName = "PythonGroup"
    person = "zhangshan1"
    image_1 = "photo1"
    image_2 = "photo2"
    imageUrl_1 = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1586178398931&di=0fd865c4a9ed6d738fc779405faf1bfe&imgtype=0&src=http%3A%2F%2Fn.sinaimg.cn%2Fsinacn12%2F200%2Fw500h500%2F20180917%2F448f-hkahyhy0985309.jpg"
    imageUrl_2 = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1586178398931&di=23ccc72884724afdf9372d4d8443fcbd&imgtype=0&src=http%3A%2F%2Fi0.hdslb.com%2Fbfs%2Farchive%2Fe2c56dbb52c81ada4448fa89478706b7d5686c4f.jpg"
    recognizeFaceImageUrl = "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1586178398931&di=43c67fda9466eb1448b660b34696ad9a&imgtype=0&src=http%3A%2F%2Fpics5.baidu.com%2Ffeed%2F8d5494eef01f3a29419b6e18d493f3375e607cd5.jpeg%3Ftoken%3De69c8c547ce96f0f4e4fbc55e8884495%26s%3DA786FB07F863A08C4E1874E80300A010"

    print("基本功能测试：")
    DetectFace(imageUrl_1)
    GetFaceAttribute(imageUrl_1)
    VerifyFace(imageUrl_1, imageUrl_2)

    print("1：N人脸识别测试：")

    AddFace(groupName, person, image_1, imageUrl_1)
    AddFace(groupName, person, image_2, imageUrl_2)

    # 列举Group
    ListGroup()

    # 列举Faces
    ListFace(groupName)

    # 人脸查询
    RecognizeFace(recognizeFaceImageUrl, groupName)

    # 删除Face
    DeleteFace(groupName, person, image_1)

    # 列举Faces查询删除情况
    ListFace(groupName)