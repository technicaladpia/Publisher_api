# MERCHANT API
## Table of contents
> <sub>✨[1. GET MERCHANTS VALID](#menu1)</sub><br />
> <sub>✨[2. UPDATE CONVERSIONS API](#menu2)</sub>
<a name="menu1"></a>
## 1. GET CONVERSIONS API
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
## 2. UPDATE CONVERSIONS API
![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)
### Request
```http
POST /v2/merchant/update_conversions
```
```http
curl -X POST https://api.adpia.vn/v2/merchant/update_conversions
    -H "Content-Type: application/json"
    -H "Authorization: Basic $(echo -n username:password | base64)"
    -d '{"ocd":"14424827977", "pcd":"26158215", "status":"reject", "reason":"Policy violation"}'
```
### Common Request Parameters
| Parameter | Type | Required | Description |
| ------ | ------ | ------ | ------ |
| `ocd` | String | true | Order Code : ID of order |
| `pcd` | String | true | Product code: ID of product |
| `status` | String | true | State of orders: pending - approve - reject |
| `reason` | String | true/false | Reason for rejecting results. If the status is reject, this field is required |
### Responses
```javascript
{
    "message": "OK",
    "description": "Success!",
    "code": "200",
    "data": []
}
```
### Status Codes
| Status Code | Description |
| ------ | ------ |
| `200` | OK |
| `400` | Bad request |
| `401` | Authentication failed |
| `403` | Update faild |
| `404` | Missing params |
| `500` | Internal server error |
