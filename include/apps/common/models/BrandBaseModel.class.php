<?php


/* 访问控制 */
defined('IN_ECTOUCH') or die('Deny Access');

class BrandBaseModel extends BaseModel {

    /**
     * 获得指定品牌的详细信息
     *
     * @access  private 
     * @param   integer $id
     * @return  void
     */
    function get_brand_info($id) {
        $sql = 'SELECT * FROM ' . $this->pre . "brand WHERE brand_id = '$id'";
        $res = $this->row($sql);
        $res['brand_logo'] = get_data_path($res['brand_logo'], 'brandlogo');
        $res['brand_banner'] = get_data_path($res['brand_banner'], 'brandbanner');
        return $res;
    }

    /**
     * 取得品牌列表
     * @return array 品牌列表 id => name
     */
    function get_brand_list() {
        $sql = 'SELECT brand_id, brand_name FROM ' . $this->pre . 'brand ORDER BY sort_order';
        $res = $this->query($sql);

        $brand_list = array();
        foreach ($res AS $row) {
            $brand_list[$row['brand_id']] = addslashes($row['brand_name']);
        }

        return $brand_list;
    }

}
