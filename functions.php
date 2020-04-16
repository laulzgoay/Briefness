<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('INITIAL_VERSION_NUMBER', '1.2.0');
if (Helper::options()->GravatarUrl) define('__TYPECHO_GRAVATAR_PREFIX__', Helper::options()->GravatarUrl);
function themeConfig($form) {
    
/**
 zeze
 **/

    $tools = new Typecho_Widget_Helper_Form_Element_Checkbox('tools', 
    array(
'banquan' => _t('开启文章底部版权提示'),
),
    array('prism','fancybox'), _t('<span onclick="bian()">拓展设置</span>'));$tools->setAttribute('class', 'col-mb-12 typecho-option home');
    $form->addInput($tools->multiMode());

    $icpNum = new Typecho_Widget_Helper_Form_Element_Text('icpNum', NULL, NULL, _t('网站备案号'), _t('在这里填入网站备案号'));
    $form->addInput($icpNum);
    
    $siteStat = new Typecho_Widget_Helper_Form_Element_Textarea('siteStat', NULL, NULL, _t('统计代码'), _t('在这里填入网站统计代码'));
    $form->addInput($siteStat);


    $subTitle = new Typecho_Widget_Helper_Form_Element_Text('subTitle', NULL, NULL, _t('自定义站点副标题'), _t('浏览器副标题，仅在当前页面为首页时显示，显示格式为：<b>标题 - 副标题</b>，留空则不显示副标题'));
	$form->addInput($subTitle);

	$favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, '/usr/themes/Briefness/img/favicon.ico', _t('Favicon 地址'), _t('在这里填入一个图片 URL 地址, 以添加一个 Favicon，留空则不单独设置 Favicon，主题默认 Favicon 地址为 /usr/themes/Briefness/img/favicon.ico'));
	$form->addInput($favicon);

    //LOGO地址
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, '/usr/themes/Briefness/img/logo.png', _t('站点LOGO地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO ，主题默认 LOGO 地址为 /usr/themes/Briefness/img/logo.png'));
	$form->addInput($logoUrl->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    

    //附件源地址
    $src_address = new Typecho_Widget_Helper_Form_Element_Text('src_add', NULL, NULL, _t('替换前地址'), _t('即你的附件存放地址，如http://www.yourblog.com/usr/uploads/'));
    $form->addInput($src_address);
    //替换后地址
    $cdn_address = new Typecho_Widget_Helper_Form_Element_Text('cdn_add', NULL, NULL, _t('替换后'), _t('即你的七牛云存储域名，如http://yourblog.qiniudn.com/'));
    $form->addInput($cdn_address);
    
    
    $GravatarUrl = new Typecho_Widget_Helper_Form_Element_Radio('GravatarUrl', 
	array(false => _t('官方源'),
	'https://cn.gravatar.com/avatar/' => _t('官方国内源'),
	'https://cdn.v2ex.com/gravatar/' => _t('V2EX源')),
	false, _t('Gravatar头像源'), _t('默认官方源'));
	$form->addInput($GravatarUrl);
    
}
function showThumb($obj,$size=null,$link=false,$pattern='<div class="post-thumb"><a class="thumb" href="{permalink}" title="{title}" style="background-image:url({thumb})"></a></div>'){
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    if(isset($matches[1][0])){
        $thumb = $matches[1][0];;
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
        if($size!='full'){
            $thumb_width = $options->thumb_width;
            $thumb_height = $options->thumb_height;
    
            if($size!=null){
                $size = explode('x', $size);
                if(!empty($size[0]) && !empty($size[1])){
                    list($thumb_width,$thumb_height) = $size;
                }
            }
            $thumb .= '?imageView2/4/w/'.$thumb_width.'/h/'.$thumb_height;
        }
    }
	if(empty($thumb) && empty($options->default_thumb)){
	    return '';
	}else{
	    $thumb = empty($thumb) ? $options->default_thumb : $thumb;
	}
	if($link){
	    return $thumb;
	}
	echo str_replace(
	    array('{title}','{thumb}','{permalink}'),
	    array($obj->title,$thumb,$obj->permalink),
	    $pattern);
}
/**
 * 解析内容以实现附件加速
 * @access public
 * @param string $content 文章正文
 * @param Widget_Abstract_Contents $obj
 */
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
    echo trim($obj->content);
}
/**
 * 生成随机颜色值
 * @return string
 */
function randColor(){
    return rand(120,200).','.rand(120,200).','.rand(120,200);
}
/**
 * 显示标签
 * @param string $parse 解析模版
 * @param number $limit 显示条数 为0时表示显示全部
 * @param string $sort 排序字段
 * @param number $desc 默认为0,表示倒序
 * @return void
 */
function showTagCloud($parse=null,$limit=30,$sort='mid',$desc=0){
    $parse = is_null($parse) ? '<li><a href="{permalink}" title="{count}个话题" style="{background}">{name}({count})</a></li>': $parse;
    Typecho_Widget::widget('Widget_Metas_Tag_Cloud', 'sort='.$sort.'&ignoreZeroCount=1&desc='.$desc.'&limit='.$limit)->to($tags);
    $output = '';
    if($tags->have()){
        while ($tags->next()){
            $color = 'color: rgb('.randColor().');';
            $background = 'background-'.$color;
            $output .= str_replace(
                array('{permalink}','{count}','{name}','{background}','{color}'),
                array($tags->permalink,$tags->count,$tags->name,$background,$color),
                $parse);
        }
    }
    echo $output;
}


function  art_count ($cid){
$db=Typecho_Db::get ();
$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
echo mb_strlen($rs['text'], 'UTF-8');
}

/**
 * 加载时间
 * @return bool
 */

function timer_stop( $display = 0, $precision = 3 ) {
    $timestart = $_SERVER [‘REQUEST_TIME’];
    $mtime     = explode( ' ', microtime() );
    $timeend   = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
        echo $r;
    }
    return $r;
}
