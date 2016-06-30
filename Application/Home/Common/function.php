<?php

function pageQuery($query, $currentPage, $perPageNum) {
	$fetchFrom = $currentPage * $perPageNum;
	$prefetchPage = $currentPage < 5? 10 - $currentPage: 5;
	$fetchNum = $prefetchPage * $perPageNum + 1;
	$datas = $query->limit("'".$fetchFrom.",".$fetchNum."'")->select();
	$leftPage = (int)(($totalNum - 1)/ 10);
	$datas = array_slice($datas, 0, $perPageNum);
	$result = array();
	$result['datas'] = $datas;
	$result['leftPage'] = $leftPage;
	return $result;
}

function pageQueryRaw($table, $queryStr, $currentPage, $perPageNum) {
	$fetchFrom = $currentPage * $perPageNum;
	$prefetchPage = $currentPage < 5? 10 - $currentPage: 5;
	$fetchNum = $prefetchPage * $perPageNum + 1;
	$queryStr = $queryStr." LIMIT ".$fetchFrom.",".$fetchNum;
	$datas = $table->query($queryStr);
	$leftPage = (int)(($totalNum - 1)/ 10);
	$datas = array_slice($datas, 0, $perPageNum);
	$result = array();
	$result['datas'] = $datas;
	$result['leftPage'] = $leftPage;
	return $result;	
}
?>
