<?php

require_once "../includes/DB.php";

class MenuTree {
	
	private $db;

	public function __construct()
	{
		$this->db = new DB();
	}

	public function getMenuTree($parentID=0)
	{
		$html = "";

		$sql = "SELECT  category_id
					  , category_name
				  FROM category
				 WHERE id_parent = ".$parentID;

		$result = $this->db->query($sql);

		if($result->num_rows > 0)
		{
			$html = '<ul>';// open list tag

			while($categ = $result->fetch_object())
			{
				// open list item
				$html .= '<li><a href="/web_php_cms/posts.php?categ_id='.$categ->category_id .'">'. $categ->category_name .'</a>';
				// search if current item has children to append
				$html .= $this->getMenuTree($categ->category_id);
				// close LI
				$html .= '</li>';
			}

			$html .= '</ul>';// close list tag
		}

		return $html;
	}
}
?>