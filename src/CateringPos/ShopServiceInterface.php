<?php

namespace CateringPos;

interface ShopServiceInterface
{
	public function getShopInfo($shop_id);
	public function getDeskInfo($desk_id);
}