<?php

/**
 * 微信公众平台操作类
 */
class WeChat {

	private $_appid;
	private $_appsecret;
	private $_token;// 公众平台请求开发者时需要标记

	//表示QRCode的类型
	const QRCODE_TYPE_TEMP = 1;
	const QRCODE_TYPE_LIMIT = 2;
	const QRCODE_TYPE_LIMIT_STR = 3;

	private $_msg_template = array(
		'text' => '<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[%s]]></Content></xml>',//文本回复XML模板
		'image' => '<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[image]]></MsgType><Image><MediaId><![CDATA[%s]]></MediaId></Image></xml>',//图片回复XML模板
		'music' => '<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[music]]></MsgType><Music><Title><![CDATA[%s]]></Title><Description><![CDATA[%s]]></Description><MusicUrl><![CDATA[%s]]></MusicUrl><HQMusicUrl><![CDATA[%s]]></HQMusicUrl><ThumbMediaId><![CDATA[%s]]></ThumbMediaId></Music></xml>',//音乐模板
		'news' => '<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[news]]></MsgType><ArticleCount>%s</ArticleCount><Articles>%s</Articles></xml>',// 新闻主体
		'news_item' => '<item><Title><![CDATA[%s]]></Title><Description><![CDATA[%s]]></Description><PicUrl><![CDATA[%s]]></PicUrl><Url><![CDATA[%s]]></Url></item>',//某个新闻模板
		);

	public function __construct($id, $secret, $token) {
		$this->_appid = $id;
		$this->_appsecret = $secret;
		$this->_token = $token;
	}

	/**
	 * 设置菜单
	 */
	public function menuSet($menu) {
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $this->_getAccessToken();
		$data = $menu;
		$result = $this->_requestPost($url, $data);
		if ($result_obj->errcode == 0) {
			return true;
		} else {
			echo $result_obj->errmsg, '<br>';
			return false;
		}
	}

	/**
	 * 菜单删除
	 */
	public function menuDelete() {
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=' . $this->_getAccessToken();
		$result = $this->_requestGet($url);
		$result_obj = json_decode($result);
		if ($result_obj->errcode == 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 相应公众平台数据
	 * @return [type] [description]
	 */
	public function responseMSG() {
		// 获取请求时POST：XML字符串
		// $_POST,不是key/value型因此不能使用该数组
		$xml_str = $GLOBALS['HTTP_RAW_POST_DATA'];

		// 如果没有post数据，则响应空字符串表示结束
		if (empty($xml_str)) {
			die ('');
		}

		// 解析该xml字符串，利用simpleXML
		libxml_disable_entity_loader(true);//禁止xml实体解析，防止xml注入
      	$request_xml = simplexml_load_string($xml_str, 'SimpleXMLElement', LIBXML_NOCDATA);//从字符串获取simpleXML对象

      	// 判断该消息的类型通过元素：MsgType
      	switch ($request_xml->MsgType) {
      		case 'event': // 事件类型
      			// 判断具体的事件类型（关注，取消，点击）
      			$event = $request_xml->Event;
      			if ('subscribe'==$event) { // 关注事件
      				$this->_doSubscribe($request_xml);
      			}
      			elseif ('CLICK' == $event) { //菜单点击事件
      				$this->_doClick($request_xml);
      			}
      			elseif ('VIEW' == $event) { //连接跳转事件
					$this->_doView($request_xml);
      			}
      			break;
      		case 'text': // 文本消息
      			$this->_doText($request_xml);
      			break;
      		case 'image': // 图片消息
      			$this->_doImage($request_xml);
      			break;
      		case 'voice': // 语音消息
      			$this->_doVoice($request_xml);
      			break;
      		case 'video': // 视频消息
      			$this->_doVideo($request_xml);
      			break;
      		case 'shortvideo': // 短视频消息
      			$this->_doShortVideo($request_xml);
      			break;
      		case 'location': // 位置消息
      			$this->_doLocation($request_xml);
      			break;
      		case 'link': // 连接消息
      			$this->_doLink($request_xml);
      			break;
      		default:
      			# code...
      			break;
      	}
	}
	private function _doClick($request_xml) {
		$content = '你点击了菜单，携带的KEY为: ' . $request_xml->EventKey;
		$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $content);
	}
	/**
	 * 用于处理文本消息的方法
	 */
	private function _doText($request_xml) {
		// 获取文本内容
		$content = $request_xml->Content;
		// 对内容进行判断
		if ('?' == $content) {
			// 显示帮助信息
			$response_content = '输入对应序号或名称，获取相应资源' . "\n" . '[1]PHP'."\n". '[2]Java' . "\n" . '[3]C++';
			// 将处理好的响应数据回复给用户
			$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $response_content);
		} elseif ('1' == strtolower($content) || 'php'==strtolower($content)) {
			$response_content = 'PHP工程师培训: ' . "\n" . 'http://php.itcast.cn/';
			// 将处理好的响应数据回复给用户
			$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $response_content);
		}
 		elseif ('2' == strtolower($content) || 'java'==strtolower($content)) {
			$response_content = 'Java工程师培训: ' . "\n" . 'http://java.itcast.cn/';
			// 将处理好的响应数据回复给用户
			$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $response_content);
		}
 		elseif ('3' == strtolower($content) || 'c++'==strtolower($content)) {
			$response_content = 'C++工程师培训: ' . "\n" . 'http://c.itcast.cn/';
			// 将处理好的响应数据回复给用户
			$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $response_content);
		}
		elseif ('图片' == $content) {
			$id_list = array(
				'eLrmGKbhf5kS86A9bqzkLS8-45sWvqBwUv4Q7XDd-oAds44Ad9hxq9h-ShmRQLyJ',
				'0Fnq-gYU8zDugqxjPNywkhW5KSHXT6DdF-NGovaPfKry8grmheEVdEkdeY8qjZ--');
			$rand_index = mt_rand(0, count($id_list)-1);
			// 具体那张图片，应该由业务逻辑决定

			$this->_msgImage($request_xml->FromUserName, $request_xml->ToUserName, $id_list[$rand_index], true);
		}
		elseif ('音乐' == $content) {
			$music_url = 'http://weixin.fortheday.cn/dnaw.mp3';
			$ha_music_url = 'http://weixin.fortheday.cn/dnaw.mp3';
			$thumb_media_id = '0Fnq-gYU8zDugqxjPNywkhW5KSHXT6DdF-NGovaPfKry8grmheEVdEkdeY8qjZ--';
			$title = '等你爱我';
			$desc = '等你爱我-等到地老天荒';
			$this->_msgMusic($request_xml->FromUserName, $request_xml->ToUserName, $music_url, $hq_music_url, $thumb_media_id, $title, $desc);
		}
		elseif ('新闻' == $content) {
			$item_list = array(
				array('title'=>'其实你该用母亲的方式回报母亲', 'desc'=>'母亲节快乐', 'picurl'=>'http://weixin.fortheday.cn/1.jpg', 'url'=>'http://www.soso.com/'),
				array('title'=>'母亲节宠爱不手软，黄金秒杀豪礼特惠值到爆', 'desc'=>'母亲节快乐', 'picurl'=>'http://weixin.fortheday.cn/2.jpg', 'url'=>'http://www.soso.com/'),
				array('title'=>'浅从财富管理视角看巴菲特思想', 'desc'=>'母亲节快乐', 'picurl'=>'http://weixin.fortheday.cn/3.jpg', 'url'=>'http://www.soso.com/'),
				array('title'=>'广邀好友打气，赢取万元旅游金', 'desc'=>'母亲节快乐', 'picurl'=>'http://weixin.fortheday.cn/4.jpg', 'url'=>'http://www.soso.com/'),
				);
			$this->_msgNews($request_xml->FromUserName, $request_xml->ToUserName, $item_list);
		}
		else {
			// 通过小黄鸡，响应给微信用户
			$url = 'http://www.xiaohuangji.com/ajax.php';
			$data['para'] = $content;
			$response_content = $this->_requestPost($url, $data, false);
		}
	}

	/**
	 * 处理图片响应数据
	 */
	private function _doImage($request_xml) {
		$content = '你所上传的图片的Media_ID:' . $request_xml->MediaId;
		$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $content);
	}

	private function _doLocation($request_xml) {
		// $content = '你的坐标为,经度:'.$request_xml->Location_Y.',纬度:'.$request_xml->Location_X . "\n" . '你所在的位置为：' . $request_xml->Label;
		// $this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $content);
		// 利用位置获取信息
		//百度LBS圆形范围查询：
		$url = 'http://api.map.baidu.com/place/v2/search?query=%s&location=%s&radius=%s&output=%s&ak=%s';
		$query = '银行';
		$location  = $request_xml->Location_X . ',' . $request_xml->Location_Y;
		$radius = 2000;
		$output = 'json';
		$ak = 'OBDl6igKrng0V6VqT5RWIP6z';
		$url = sprintf($url, urlencode($query), $location, $radius, $output, $ak);
		$result = $this->_requestGet($url, false);
		$result_obj = json_decode($result);
		$re_list = array();
		foreach($result_obj->results as $re) {
			$r['name'] = $re->name;
			$r['address'] = $re->address;
			$re_list[] = implode('-', $r);
		}
		$re_str = implode("\n", $re_list);
		//
		$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $re_str);
	}
	/**
	 * 用于处理关注事件的方法
	 * @param  [type] $request_xml 事件信息对象
	 * @return [type]              [description]
	 */
	private function _doSubscribe($request_xml) {
		// 利用消息发送，完成向关注用户打招呼功能！

		$content = '感谢你关注，会向你发送优惠信息，请查收';
		$this->_msgText($request_xml->FromUserName, $request_xml->ToUserName, $content);
	}

	/**
	 * 发送文本信息
	 * @param  [type] $to      目标用户ID
	 * @param  [type] $from    来源用户ID
	 * @param  [type] $content 内容
	 * @return [type]          [description]
	 */
	private function _msgText($to, $from, $content) {
		$response = sprintf($this->_msg_template['text'], $to, $from, time(), $content);
		die($response);
	}
	/**
	 * 发送图片消息
	 * @param  [type] $to   [description]
	 * @param  [type] $from [description]
	 * @param  [type] $file 图片文件地址
	 * @return [type]       [description]
	 */
	private function _msgImage($to, $from, $file, $is_id=false) {
		if ($is_id) {
			$media_id = $file;
		} else {
			// 上传图片到微信公众服务器，获取mediaID
			$result_obj = $this->uploadTmp($file, 'image');
			$media_id = $result_obj->media_id;
		}
		// 拼凑图像类消息xml文件
		$response = sprintf($this->_msg_template['image'], $to, $from, time(), $media_id);
		die($response);
	}

	/**
	 * [_msgMusic description]
	 * @param  [type] $to             [description]
	 * @param  [type] $from           [description]
	 * @param  [type] $music_url      [description]
	 * @param  [type] $thumb_media_id [description]
	 * @param  string $title          [description]
	 * @param  string $desc           [description]
	 * @return [type]                 [description]
	 */
	private function _msgMusic($to, $from, $music_url, $hq_music_url, $thumb_media_id, $title='', $desc='') {
		$response = sprintf($this->_msg_template['music'], $to, $from, time(), $title, $desc, $music_url, $hq_music_url, $thumb_media_id);
		die($response);
	}

	private function _msgNews($to, $from, $item_list=array()) {
		// 拼凑文章部分
		$item_str = '';
		foreach($item_list as $item) {
			$item_str .= sprintf($this->_msg_template['news_item'], $item['title'], $item['desc'], $item['picurl'], $item['url']);
		}
		//拼凑整体图文部分
		$response = sprintf($this->_msg_template['news'], $to, $from, time(), count($item_list), $item_str);
		die($response);
	}

	/**
	 * 上传临时素材
	 */
	public function uploadTmp($file, $type) {
		$url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->_getAccessToken() .'&type='.$type;

		$data['media'] = '@'. $file;
		$result = $this->_requestPost($url, $data);
		$result_obj = json_decode($result);
		return $result_obj;
	}

	/**
	 * 用于第一次验证URL合法性
	 */
	public function firstValid() {
		// 检验签名的合法性
		if ($this->_checkSignature()) {
			// 签名合法，告知微信公众平台服务器
			echo $_GET['echostr'];
		}
	}
	/**
	 * 验证签名
	 * @return bool [description]
	 */
	private function _checkSignature() {
		// 获得由微信公众平台请求的验证数据
		$signature = $_GET['signature'];
		$timestamp = $_GET['timestamp'];
		$nonce = $_GET['nonce'];
		// 将时间戳，随机字符串，token按照字母顺序排序并连接
		$tmp_arr = array($this->_token, $timestamp, $nonce);
		sort($tmp_arr, SORT_STRING);// 字典顺序
		$tmp_str = implode($tmp_arr);//连接
		$tmp_str = sha1($tmp_str);// sha1签名

		if ($signature == $tmp_str) {
			return true;
		} else {
			return false;
		}
	}



	/**
	 * 获取 access_tonken
	 * @param string $token_file 用来存储token的临时文件
	 */
	private function _getAccessToken($token_file='./access_token') {
		// 考虑过期问题，将获取的access_token存储到某个文件中
		$life_time = 7200;
		if (file_exists($token_file) && time()-filemtime($token_file)<$life_time) {
			// 存在有效的access_token
			return file_get_contents($token_file);
		}
		// 目标URL：
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->_appid}&secret={$this->_appsecret}";
		//向该URL，发送GET请求
		$result = $this->_requestGet($url);
		if (!$result) {
			return false;
		}
		// 存在返回响应结果
		$result_obj = json_decode($result);
		// 写入
		file_put_contents($token_file, $result_obj->access_token);
		return $result_obj->access_token;
	}

	/**
	 * [getQRCodeTicket description]
	 * @param $content 内容
	 * @param $type qr码类型
	 * @param $expire 有效期，如果是临时的类型则需要该参数
	 * @return string ticket
	 */
	private function _getQRCodeTicket($content, $type=2, $expire=604800) {
		$access_token = $this->_getAccessToken();
		$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$access_token";
		$type_list = array(
			self::QRCODE_TYPE_TEMP => 'QR_SCENE',
			self::QRCODE_TYPE_LIMIT => 'QR_LIMIT_SCENE',
			self::QRCODE_TYPE_LIMIT_STR => 'QR_LIMIT_STR_SCENE',
			);
		$action_name = $type_list[$type];

		switch ($type) {
			case self::QRCODE_TYPE_TEMP:
			// {"expire_seconds": 604800, "action_name": "QR_SCENE", "action_info": {"scene": {"scene_id": 123}}}
				$data_arr['expire_seconds'] = $expire;
				$data_arr['action_name'] = $action_name;
				$data_arr['action_info']['scene']['scene_id'] = $content;
				break;
			case self::QRCODE_TYPE_LIMIT:
				$data_arr['action_name'] = $action_name;
				$data_arr['action_info']['scene']['scene_id'] = $content;
				break;
			case self::QRCODE_TYPE_LIMIT_STR:
				$data_arr['action_name'] = $action_name;
				$data_arr['action_info']['scene']['scene_str'] = $content;
				break;
		}

		$data = json_encode($data_arr);
		$result = $this->_requestPost($url, $data);
		if (!$result) {
			return false;
		}
		//处理响应数据
		$result_obj = json_decode($result);
		return $result_obj->ticket;
	}
	/**
	 * 生成二维码
	 * @param  int|string  $content qrcode内容标识
	 * @param  [type]  $file    存储为文件的地址，如果为NULL表示直接输出
	 * @param  integer $type    类型
	 * @param  integer $expire  如果是临时，表示其有效期
	 * @return [type]           [description]
	 */
	public function getQRCode($content, $file=NULL, $type=2, $expire=604800) {
		// 获取ticket
		$ticket = $this->_getQRCodeTicket($content, $type=2, $expire=604800);
		$url = 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$ticket;

		$result = $this->_requestGet($url);//此时result就是图像内容
		if ($file) {
			file_put_contents($file, $result);
		} else {
			header('Content-Type: image/jpeg');
			echo $result;
		}
	}
	private function _requestPost($url, $data, $ssl=true) {
		// curl完成
		$curl = curl_init();

		//设置curl选项
		curl_setopt($curl, CURLOPT_URL, $url);//URL
		$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '
Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 FirePHP/0.7.4';
		curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);//user_agent，请求代理信息
		curl_setopt($curl, CURLOPT_AUTOREFERER, true);//referer头，请求来源
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);//设置超时时间
		//SSL相关
		if ($ssl) {
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//禁用后cURL将终止从服务端进行验证
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//检查服务器SSL证书中是否存在一个公用名(common name)。
		}
		// 处理post相关选项
		curl_setopt($curl, CURLOPT_POST, true);// 是否为POST请求
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);// 处理请求数据
		// 处理响应结果
		curl_setopt($curl, CURLOPT_HEADER, false);//是否处理响应头
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//curl_exec()是否返回响应结果

		// 发出请求
		$response = curl_exec($curl);
		if (false === $response) {
			echo '<br>', curl_error($curl), '<br>';
			return false;
		}
		curl_close($curl);
		return $response;
	}

	/**
	 * 发送GET请求的方法
	 * @param string $url URL
	 * @param bool $ssl 是否为https协议
	 * @return string 响应主体Content
	 */
	private function _requestGet($url, $ssl=true) {
		// curl完成
		$curl = curl_init();

		//设置curl选项
		curl_setopt($curl, CURLOPT_URL, $url);//URL
		$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '
Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 FirePHP/0.7.4';
		curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);//user_agent，请求代理信息
		curl_setopt($curl, CURLOPT_AUTOREFERER, true);//referer头，请求来源
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);//设置超时时间

		//SSL相关
		if ($ssl) {
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//禁用后cURL将终止从服务端进行验证
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//检查服务器SSL证书中是否存在一个公用名(common name)。
		}
		curl_setopt($curl, CURLOPT_HEADER, false);//是否处理响应头
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//curl_exec()是否返回响应结果

		// 发出请求
		$response = curl_exec($curl);
		if (false === $response) {
			echo '<br>', curl_error($curl), '<br>';
			return false;
		}
		curl_close($curl);
		return $response;
	}

}