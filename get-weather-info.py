# coding: utf-8

# モジュールインポート
import json, urllib2

# 天気取得のURL設定
# cityに地域コードを設定
city = "140010"
# 取得URLを生成
url = 'http://weather.livedoor.com/forecast/webservice/json/v1?city=%s' % city

try:
    # 天気データ取得
    # 最初に指定URLのデータ取得
    response = urllib2.urlopen(url)
    # jsonデータ取得
    weather = json.loads(response.read())

    # 取得したデータを表示
    # titleとforecastsの最初の要素のtelopを表示
    print weather['title'] + " : " + weather['forecasts'][0]['telop']

finally:
    response.close()
