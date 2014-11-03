<?php 
//ini_set('memory_limit', '-1');
require_once 'DB.php';


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

$menu = new MenuTree();
echo $menu->getMenuTree();

exit();


	//GET POST FIELD VALUES
	$username_value = "admin";
	$password_value = "test";


	$sql = "SELECT user_id
			  FROM user
			 WHERE username = ? 
			   AND `password` = ?
			   AND active = 1 ";

	$result = $db->select_prep($sql, array($username_value, $password_value));

	print_r($result);
	exit();


	//CLEAN SPEACIAL CHARS BASED ON THE CURRENT DB's Charset
	$username_clean = $db->escape($username_value);
	$password_clean = $db->escape($password_value);

	$sql = "SELECT user_id
			  FROM user
			 WHERE username = '$username_clean' 
			   AND `password` = '$password_clean'
			   AND active = 1 ";

	$result = $db->select($sql);

	print_r($result);
	exit();

?>
