<?php
// include 'common.php';
include 'header.php';
include 'menu.php';
?>

<div class="main">
    <div class="body container">
        <br>
        <br>
        <br>
        <div style="margin-left:15%"> <!--Instructions-->
           <span style="color:brown"><h2>欢迎使用SSL证书在线生成器，请完成以下步骤以获得SSL证书</h2></span><br>
           <span>第一步：请前往<a href="https://free-ssl-online.aurorum.co/typecho">在线SSL生成器</a>进行证书申请的前两步并获得确认码</span><br>
           <br>
           <span style="size: 17px;">第二步：将获得的插件确认码填写/黏贴至下方方框中，并点击确认提交</span>
        </div>
        <br>
        <div class="row typecho-page-main" role="form">
            <div class="col-mb-12 col-tb-8 col-tb-offset-2">
                <?php 
                    $widget_options = Typecho_Widget::widget('Widget_Options');

                    $url = Typecho_Common::url(__TYPECHO_ADMIN_DIR__ . 'AutoSSL/add', $widget_options->index);
                    $form = new Typecho_Widget_Helper_Form($url, 'post');

                    $input_desc =  _t('请前往： ') . '<br/><strong><a href="https://free-ssl-online.aurorum.co/typecho">在线SSL生成器</a>' . _t('进行证书申请并获得SSL确认码验证域名所有权');
                    $input = new Typecho_Widget_Helper_Form_Element_Textarea('url', NULL, '', _t('Aurorum SSL 确认码 (必填)'), $input_desc);
                    $form->addInput($input);

                    // $input_desc = _t('解压缩后主题目录的名字（非常重要，因为目录名字错误的话，将会导致日后无法管理主题）');
                    // $input = new Typecho_Widget_Helper_Form_Element_Text('rename', NULL, '', _t('重命名(必填)'), $input_desc);
                    // $form->addInput($input);
                    
                    $submit = new Typecho_Widget_Helper_Form_Element_Submit('button', NULL, _t('确认提交？'));
                    $form->addInput($submit);
                   
                    $form->render();
                ?>
            </div>
        </div>
            <br>
            <br>
        <div style="margin-left:15%"> <!--Instructions-->
            <span style="size: 17px;">第三步：回到<a href="https://free-ssl-online.aurorum.co/typecho">在线SSL生成器</a>页面继续完成域名所有权验证并获得SSL证书就大功告成啦</span>
            <br>
            <br>
            <span>遇到任何问题请前往<a href="https://open.aurorum.co/t/autossl-help">帮助论坛</a>获得帮助</span>
            <span>有任何修改意见，好的想法，或者仅仅是想聊聊天，都欢迎前往<a href="https://open.aurorum.co/t/aurorum-studio-typecho-autossl">项目论坛</a></span>
            <br>
            <br>
        </div>
        <div style="margin-left: 39%;">
        <span> Copyright © <a href="https://github.com/Aurorum-Studio">Aurorum-Studio</a></span><br>
        <span style="margin-left: 5%;"><a href="https://open.aurorum.co/d/15">开源许可与使用声明</a></span>
        </div>
    </div>
</div>

<?php
include 'copyright.php';
include 'common-js.php';
include 'form-js.php';
include 'footer.php';
?>