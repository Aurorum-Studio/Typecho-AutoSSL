<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class AutoSSL_Action extends Typecho_Widget
{
   public function add()
	{
		//禁止非管理员访问
      $this->widget('Widget_User')->pass('administrator');
      $options = $this->widget('Widget_options');
      
      // $rename = $this->request->rename;
      $url = $this->request->url;
      $dir0 = __TYPECHO_ROOT_DIR__;
      if (!$url)
         throw new Typecho_Widget_Exception(_t('必填项都需要填写'), 401);

      if (!is_dir($dir0))
         throw new Typecho_Widget_Exception(_t('目录权限不足，前往<a href="https://open.aurorum.co/t/autossl-help">帮助论坛</a>获得帮助'), 401);

      // if(is_dir($themes . DIRECTORY_SEPARATOR . $rename))
      //    throw new Typecho_Widget_Exception(_t('存在相同名字的主题目录'), 401);
      
      // mkdir($themes . DIRECTORY_SEPARATOR . $rename, 0755);

      $dirPath = __DIR__ . '/../../../.well-known/acme-challenge';

      // 确保目录存在
      if (!is_dir($dirPath)) {
          if (!mkdir($dirPath, 0755, true) && !is_dir($dirPath)) {
              exit('无法创建目录: ' . $dirPath);
          }
      }
      
      // 提取文件名（前43位）
      $filename = substr($url, 0, 43);
      // 构建文件的完整路径
      $filePath = $dirPath . '/' . $filename;
      
      // 写入内容到文件
      if (file_put_contents($filePath, $url) === false) {
          exit('验证文件写入失败，前往<a href="https://open.aurorum.co/t/autossl-help">帮助论坛</a>获得帮助');
      }
      
      // 如果一切顺利，输出成功信息
      echo '验证文件创建成功, 返回上一页继续哦';
   }
}