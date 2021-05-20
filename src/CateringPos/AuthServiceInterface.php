<?php

namespace CateringPos;

interface AuthServiceInterface
{
	public function checkAuthToken($jwt_token, $user_type);
	
	/**
	 * 生成JWT
	 * @param $user_data
	 * @param $user_type
	 * @return false|string
	 */
	public function creatAuthToken($user_data, $user_type);
	
	/**
	 * 获取token详情
	 * @param $jwt_token
	 * @param $user_type
	 * @return false|mixed
	 */
	public function getTokenInfo($jwt_token, $user_type);
	
	/**
	 * 检测token黑名单
	 * @param $jwt_token
	 * @param $user_type
	 * @return bool
	 */
	public function checkTokenBlock($jwt_token, $user_type): bool;
	
	/**
	 * 设置token黑名单
	 * @param $jwt_token
	 * @param $user_type
	 * @return bool
	 */
	public function setTokenBlock($jwt_token, $user_type): bool;
}