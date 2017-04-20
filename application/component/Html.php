<?php
/**
 * Html.php.
 * @author keepeye <carlton.cheng@foxmail.com>
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace app\component;


//html标签助手
class Html
{
    protected static $_instance;

    /**
     * 生成 input:text 标签
     *
     * usage: Html::getInstance()->inputText('foo','bar',['class'=>'form-control','readonly'=>'true'])
     * output: <input type="text" name="foo" value="bar" class="form-control" readonly="true" >
     *
     * @param string $name name属性
     * @param string $value 默认值
     * @param array $attributes 标签属性
     * @return string
     */
    public function inputText($name,$value,array $attributes = [])
    {
        $dom = sprintf('<input type="text" name="%s" value="%s" %s>',$name,$value,$this->parseAttributes($attributes));
        return $dom;
    }

    /**
     * 生成 select 标签
     *
     * usage: Html::getInstance()->select('foo', '123', [''=>'请选择','123' => '选项1'], ['class'=>'form-control'])
     * output: <select name="foo" class="form-control"><option value="">请选择</option><option value="123" selected>选项1</option></select>
     *
     * @param string $name name属性
     * @param string $value 默认值
     * @param array $options 选项
     * @param array $attributes 属性
     * @return string
     */
    public function select($name, $value, $options, $attributes = [])
    {
        $dom = sprintf('<select name="%s" %s>',$name,$this->parseAttributes($attributes));
        $opts = "";
        foreach ($options as $val => $text) {
            $opts .= sprintf('<option value="%s" %s>%s</option>',$val,$value === (string)$val ? 'selected' : '',$text);
        }
        $dom .= $opts;
        $dom .= "</select>";
        return $dom;
    }

    /**
     * 解析并生成标签属性字符串
     *
     * @param array $options
     * @return string
     */
    protected function parseAttributes(array $options)
    {
        $str = '';
        foreach ($options as $attr => $val) {
            $str = $str . $attr.'= "'.addslashes($val).'" ';
        }
        return $str;
    }

    //获取实例
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}
