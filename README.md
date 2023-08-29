# 空气吸收剂量率数据 API

该 API 用于获取空气吸收剂量率数据，包括不同城市的辐射量信息。

## 使用方法

API 接口：`https://your-api-domain.com/get_radiation_data.php`

### 请求

发送 GET 请求到上述 API 接口，将返回 JSON 格式的空气吸收剂量率数据。

### 响应示例

```json
[
    {
        "city": "北京",
        "radiation": "90 nGy/h"
    },
    {
        "city": "天津",
        "radiation": "71 nGy/h"
    },
    ...
]
```
### 数据字段说明
city: 城市名称
radiation: 空气吸收剂量率辐射量
### 注意事项
本 API 提供的数据仅供参考，可能随时间变化而更新。
请注意数据的版权和使用限制。
### 联系方式
如有疑问或反馈意见，请联系：yanhanv.gg@gmail.com
