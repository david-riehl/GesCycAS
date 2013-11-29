<?php
	class Test
	{
		public static function data_link_any_to_one()
		{
			Viewer::start_debug_mode();
			
			$o1_items = array(1 => new Obj_Test(1,"Obj Test 1"));
			$o2_items = array(1 => new Obj_Test2(1,"Obj Test 2",2,3,1));
			$o3_items = array(1 => new Obj_Test3(1,1));
			
			Data::link_any_to_one($o2_items,$o1_items);
			// Data::link_any_to_any($o1_items, $o3_items, $o2_items,'_role','_role');
			Data::link_any_any($o1_items, $o3_items, $o2_items,'_role','_role');
			
			Viewer::debug($o2_items[1],'$o2_items[1]');
			$o1_item = $o2_items[1]->get_obj_test();
			Viewer::debug($o1_item);
		}
	}
?>