<?php

use Hyperf\Contract\ContainerInterface;
use Hyperf\Contract\SessionInterface;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Server\ServerFactory;
use Hyperf\Utils\ApplicationContext;
use Psr\Log\LoggerInterface;
use Swoole\Websocket\Frame;
use Swoole\WebSocket\Server as WebSocketServer;

if (!function_exists('container')) {
	/**
	 * 容器实例
	 * @return \Psr\Container\ContainerInterface
	 */
	function container(): \Psr\Container\ContainerInterface
	{
		return ApplicationContext::getContainer();
	}
}

if (!function_exists('redis')) {
	/**
	 * redis 客户端实例
	 * @return \Hyperf\Redis\Redis|mixed
	 */
	function redis()
	{
		return container()->get(Hyperf\Redis\Redis::class);
	}
}

if (!function_exists('server')) {
	/**
	 * server 实例 基于 swoole server
	 * @return \Swoole\Coroutine\Server|\Swoole\Server
	 */
	function server()
	{
		return container()->get(ServerFactory::class)->getServer()->getServer();
	}
}

if (!function_exists('frame')) {
	/**
	 * websocket frame 实例
	 * @return mixed|Frame
	 */
	function frame()
	{
		return container()->get(Frame::class);
	}
}

if (!function_exists('websocket')) {
	/**
	 * websocket 实例
	 * @return mixed|WebSocketServer
	 */
	function websocket()
	{
		return container()->get(WebSocketServer::class);
	}
}

if (!function_exists('cache')) {
	/**
	 * 缓存实例 简单的缓存
	 * @return mixed|\Psr\SimpleCache\CacheInterface
	 */
	function cache()
	{
		return container()->get(Psr\SimpleCache\CacheInterface::class);
	}
}

if (!function_exists('stdLog')) {
	/**
	 * 向控制台输出日志
	 * @return StdoutLoggerInterface|mixed
	 */
	function stdLog()
	{
		return container()->get(StdoutLoggerInterface::class);
	}
}

if (!function_exists('logger')) {
	/**
	 * 向日志文件记录日志
	 * @return LoggerInterface
	 */
	function logger(): LoggerInterface
	{
		return container()->get(LoggerFactory::class)->make();
	}
}

if (!function_exists('request')) {
	/**
	 * 请求对象
	 * @return mixed|RequestInterface
	 */
	function request()
	{
		return container()->get(RequestInterface::class);
	}
}

if (!function_exists('response')) {
	/**
	 * 请求回应对象
	 * @return ResponseInterface|mixed
	 */
	function response()
	{
		return container()->get(ResponseInterface::class);
	}
}

if (!function_exists('session')) {
	/**
	 * session 对象
	 * @return SessionInterface|mixed
	 */
	function session()
	{
		return container()->get(SessionInterface::class);
	}
}

//返回失败JSON方法
if (!function_exists('returnFailJson'))
{
	function returnFailJson($msg='',$data = []): \Psr\Http\Message\ResponseInterface
	{
		return response()->json(['status'=>0,'message'=>$msg,'data'=>$data]);
	}
}

//返回成功JSON方法
if (!function_exists('returnSuccessJson'))
{
	function returnSuccessJson($data=[],$msg=''): \Psr\Http\Message\ResponseInterface
	{
		return response()->json(['status'=>1,'message'=>$msg,'data'=>$data]);
	}
}

//返回JSON方法
if (!function_exists('returnJson'))
{
	function returnJson($code,$msg='',$data = []): \Psr\Http\Message\ResponseInterface
	{
		return response()->json(['status'=>$code,'message'=>$msg,'data'=>$data]);
	}
}

//返回失败数组方法
if (!function_exists('returnFailArray'))
{
	function returnFailArray($msg='',$data = [])
	{
		return ['status'=>0,'message'=>$msg,'data'=>$data];
	}
}

//返回成功数组方法
if (!function_exists('returnSuccessArray'))
{
	function returnSuccessArray($data=[],$msg='')
	{
		return ['status'=>1,'message'=>$msg,'data'=>$data];
	}
}

//返回数组方法
if (!function_exists('returnArray'))
{
	function returnArray($code,$msg='',$data = [])
	{
		return ['status'=>$code,'message'=>$msg,'data'=>$data];
	}
}

//判断返回服务返回的是否是成功执行的数据
if (!function_exists('isSuccessArray'))
{
	function isSuccessArray($data)
	{
		if(is_array($data))
		{
			if(isset($data['status']))
			{
				if($data['status']==1)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}