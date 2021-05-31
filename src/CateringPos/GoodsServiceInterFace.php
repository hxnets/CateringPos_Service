<?php

namespace CateringPos;

interface GoodsServiceInterFace
{
	public function getGoodsUnit($map);
	
	public function setGoodsUnit($map, $data);
	
	public function addGoodsUnit($data);
	
	public function delGoodsUnit($map);
	
	public function getGoodsUnitList($map);
	
	public function getGoodsCategory($map);
	
	public function setGoodsCategory($map, $data);
	
	public function addGoodsCategory($data);
	
	public function delGoodsCategory($map);
	
	public function getGoodsCategoryList($map);
	
	public function getGoodsMedia($map);
	
	public function setGoodsMedia($map, $data);
	
	public function addGoodsMedia($data);
	
	public function delGoodsMedia($map);
	
	public function getGoodsMediaList($map, $paginate = []);
	
	public function getGoods($map, $fields = ['*']);
	
	public function setGoods($map, $data);
	
	public function addGoods($data);
	
	public function delGoods($map);
	
	public function getGoodsList($map, $paginate = []);
	
	public function getCategoryGoods($shop_id)
}