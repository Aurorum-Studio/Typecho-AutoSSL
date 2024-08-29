<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 在线自动生成免费SSL证书，解决SSL证书的烦恼。自动进行域名所有权验证，不需要有主机权限就可以轻松在线生成一份SSL证书。可以从 Let's Encrypt, ZeroSSL, Google中选择一家机构免费生成SSL证书。
 * 
 * @package 在线生成SSL证书
 * @author Aurorum-Studios
 * @version v.0.0.2
 * @link https://tools.aurorum.co
 */
class AutoSSL_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('admin/menu.php')->navBar = array('AutoSSL_Plugin', 'render');
		Helper::addPanel(1, 'AutoSSL/theme.php', _t('在线生成SSL证书'), _t('在线生成SSL证书'), 'administrator');
		Helper::addRoute('AutoSSL_add', __TYPECHO_ADMIN_DIR__ . 'AutoSSL/add', 'AutoSSL_Action', 'add');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
        //卸载配置的路由
        Helper::removePanel(1,'AutoSSL/theme.php');
        Helper::removeRoute('AutoSSL_add');
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        /** 分类名称 */
        // $name = new Typecho_Widget_Helper_Form_Element_Text('name', NULL, '???', _t('???'));
        // $form->addInput($name);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function render()
    {
        // echo '<span class="message success">'
        //     . htmlspecialchars(Typecho_Widget::widget('Widget_Options')->plugin('AutoSSL')->name)
        //     . '</span>';
    }
}
