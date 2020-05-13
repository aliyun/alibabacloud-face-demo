from aliyunsdkcore.client import AcsClient
from aliyunsdkcore.request import CommonRequest
import base64

# access_key_id, access_key_secret  https://yq.aliyun.com/articles/693979
client = AcsClient("${ak}", "${sk}", "cn-shanghai")


# DetectFaceContent API 人脸检测定位
def detect_face_by_content(image_content):
    request = CommonRequest()
    request.set_method("POST")
    request.set_domain("face.cn-shanghai.aliyuncs.com")
    request.set_action_name("DetectFace")
    request.set_version("2018-12-03")
    request.set_accept_format('json')
    request.add_body_params("Content", imageContent)
    response = client.get_response(request)
    response_str = str(response[2], 'utf-8')  # bytes 转 string
    print(response_str)  # 打印输出结果


def get_local_pic_content(file_path):
    with open(file_path, "rb") as f:
        base64_data = base64.b64encode(f.read())
    return base64_data.decode()


if __name__ == '__main__':
    imageContent = get_local_pic_content("/your/local/path/picName.jpeg") # MacOS 文件路径示例
    # imageContent = get_local_pic_content("C:\\Users\\Administrator\\Desktop\\time.jpeg) # Windows 文件路径示例
    print(imageContent)
    detect_face_by_content(imageContent)