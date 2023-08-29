<?php
// 获取 HTML 页面内容
$htmlContent = file_get_contents("https://data.rmtc.org.cn/gis/listtype0M.html");

// 创建一个 DOM 文档
$dom = new DOMDocument();
@$dom->loadHTML($htmlContent);

// 创建一个 XPath 对象
$xpath = new DOMXPath($dom);

// 初始化一个空数组来存储城市和辐射量数据
$data = array();

// 使用 XPath 查询，获取城市和辐射量数据
$cityNodes = $xpath->query('//div[@class="divname"]/a');
$radiationNodes = $xpath->query('//div[@class="divval"]/span[@class="label"]');

// 将查询结果添加到数据数组中
for ($i = 0; $i < $cityNodes->length; $i++) {
    $city = trim(preg_replace('/\s+/', ' ', $cityNodes->item($i)->nodeValue));
    $radiation = trim($radiationNodes->item($i)->nodeValue);

    // 使用正则表达式删除括号及其内容
    $city = preg_replace('/ \([^)]+\)/', '', $city);

    // 将城市和辐射量数据添加到数组中
    $data[] = array("city" => $city, "radiation" => $radiation);
}

// 设置响应头
header("Content-Type: application/json; charset=UTF-8");

// 返回 JSON 格式的数据
echo json_encode($data, JSON_UNESCAPED_UNICODE);
