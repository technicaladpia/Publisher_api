# MERCHANT API
## Table of contents
> <sub>✨[1. GET MERCHANTS VALID API](#menu1)</sub><br />
> <sub>✨[2. GET CONVERSIONS API](#menu2)</sub>
<a name="menu1"></a>
## 1. GET MERCHANTS VALID API
![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)
### Request
```http
GET /v2/merchant/get_merchants_valid
```
```bash
curl -X GET https://api.adpia.vn/v2/merchant/get_merchants_valid
  -H 'cache-control: no-cache'
  -H 'content-type: application/json'
```
### Common Request Parameters
| Parameter | Type | Required | Description |
| ------ | ------ | ------ | ------ |
| `mid` | String | false | ID of merchant |
| `adtype` | String | false | Kind of payment methods for promoting products, services or websites on the Internet. CPS - CPO - CPA |
### Responses
```javascript
{
    "message": "OK",
    "description": "Success!",
    "code": "200",
    "data": {
        "total": 115,
        "detail": [
            {
                "mid": "shopee",
                "site_name": "Shopee.vn",
                "site_url": "https://shopee.vn/",
                "site_desc": "Sàn Thương Mại Điện Tử Shopee",
                "logo": "https://img.adpia.vn/adpia/logo/shopee.png",
                "adult_flag": "N",
                "start_date": "20/08/2018",
                "cate_code": "A",
                "cate_name": "Mua sắm tổng hợp",
                "commission": "Up to 8.75%",
                "type": "CPS",
                "programs": [
                    {
                        "pgm_id": "0000",
                        "pgm_name": "Chien Dịch CPS - Shopee",
                        "pgm_start_date": "07/09/2018",
                        "pgm_com": "Up to 8.75%",
                        "pgm_desc": "{html_string}"
                    }
                ]
            }
        ]
    }
}
```
| Parameter | Type | Description |
| ------ | ------ | ------ |
| `total` | Int | Total number of valid merchants |
| `site_name` | String | Merchant's website title |
| `site_url` | String | Merchant's website homepage link |
| `site_desc` | String | Merchant's website description | 
| `logo` | String | Merchant logo image path in adpia |
| `adult_flag` | String | Yes or no merchant restricts children. Y:Yes - N:No |
| `start_date` | String | The date merchant officially operates on Adpia |
| `cate_code` | String | Merchant's category code on Adpia |
| `cate_name` | String | Merchant's category name on Adpia |
| `commission` | String | Average commission received from an order when it is confirmed |
| `type` | String | Kind of payment methods for promoting products, services or websites on the Internet. CPS - CPO - CPA |
| `programs` | String | Campaigns that merchant is currently implementing |
| `pgm_id` | String | Merchant's campaign ID |
| `pgm_name` | String | Merchant's campaign name |
| `pgm_start_date` | String | Merchant's campaign start date |
| `pgm_com` | String | Merchant's campaign average commission |
| `pgm_desc` | String | Merchant's campaign description |
### Status Codes
| Status Code | Description |
| ------ | ------ |
| `200` | OK |
| `400` | Bad request |
| `404` | Merchant not found |
| `500` | Internal server error |

<a name="menu2"></a>
## 2. GET CONVERSIONS API
![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)
### Request
```http
POST /v2/affiliate/get_conversions
```
```bash
curl -X GET https://api.adpia.vn/v2/affiliate/get_conversions?sdate=20210101&edate=20210130&page=1&limit=50
    -H "Content-Type: application/json"
    -H "Authorization: Basic $(echo -n username:password | base64)"
    -H "Cache-Control: no-cache"
```
### Common Request Parameters
| Parameter | Type | Required | Description |
| ------ | ------ | ------ | ------ |
| `sdate` | String | true | Filter orders that have been updated from this date. Format is yyyymmdd. Example: 20210101. |
| `edate` | String | true | Filter orders that have been updated to this date. Format is yyyymmdd. Example: 20210130. |
| `page` | String | fase | Page return request. Default 1 |
| `limit` | String | false | Rows return per request. Default 300 |
### Responses
```javascript
{
    "message": "OK",
    "description": "Success!",
    "code": 200,
    "data": {
        "sdate": "20210101",
        "edate": "20210130",
        "count": 1,
        "limit": 300,
        "page": 1,
        "data": [
            {
                "ymd": "20210105",
                "his": "091026",
                "conversion_id": "13000010882074",
                "ocd": "210105F30ST4XW",
                "pcd": "9606086334",
                "ccd": null,
                "ccd_name": "Giày Dép Nam",
                "ccd2": null,
                "ccd2_name": "Giày lười",
                "pname": "Giày lười da nam [FREESHIP] D335 shop ĐỊCH ĐỊCH chuyên nam đẹp giá rẻ",
                "cname": "new",
                "device": null,
                "sales": 40000,
                "actual_amount": 40000,
                "commission": 2753,
                "cnt": 1,
                "offer_id": "shopee",
                "aid": "A100014896",
                "status": "confirm",
                "aff_sub": null,
                "ip": "172.16.2.144",
                "type": "CPS"
            }
        ]
    }
}
```
| Parameter | Type | Description |
| ------ | ------ | ------ |
| `ymd` | String | Date of order received. Format will be yyyymmdd. |
| `his` | String | Time of order received. |
| `conversion_id` | String | Id of single conversion |
| `ocd` | String | Order code : ID of order | 
| `pcd` | String | Product code: ID of product |
| `ccd` | String | Category code: ID of category |
| `ccd_name` | String | Category name: Name of category |
| `ccd2` | String | ID of sub category |
| `ccd2_name` | String | Name of sub category |
| `pname` | String | Product name |
| `cname` | String | Customer Type: new - old - undefined |
| `device` | String | Information about the device that generates the order |
| `sales` | Float64 | The total amount of products. Currency VND |
| `actual_amount` | Float64 | The actual selling price of the product after applying the discount offers. Currency VND |
| `commission` | Float64 | Commission fee of product. Currency VND |
| `cnt` | Int | Quantity of product |
| `offer_id` | String | ID of offer |
| `aid` | String | Affiliate ID generates order |
| `status` | String | State of orders: pending - approve - confirm - reject - cancel |
| `aff_sub` | String | Sub Affiliate ID |
| `ip` | String | Purchase device ip address |
| `type` | String | Kind of payment methods for promoting products, services or websites on the Internet. CPS - CPO - CPA |
### Status Codes
| Status Code | Description |
| ------ | ------ |
| `200` | OK |
| `400` | Bad request |
| `401` | Authentication failed |
| `405` | Method Not Allowed |
| `500` | Internal server error |
