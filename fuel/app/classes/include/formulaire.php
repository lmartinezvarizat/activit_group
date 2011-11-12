<?

class Formulaire {

    public static function ShowForm($params = array()) {
        $params = array_merge(array(
            'url'           => Uri::current(),
            'method'        => 'post',
            'list_items'    => array(
                'default'       => array(
                    'type'            => 'text',
                    'select_value'    => array(),
                    'default_value'   => '',
                    'label'           => 'Default',
                    'style'              => array(
                        'id'              => 'default',
                        'class'           => 'default',
                    ),
                    'saut_de_ligne'      => false,
                ),
            )
        ), $params);

        echo Form::open(array('action' => $params['url'], 'method' => $params['method']));

        foreach ($params['list_items'] as $item => $value_item) {
            $style = array();
            if (isset($value_item['style'])) {
                foreach ($value_item['style'] as $key => $value) {
                    $style[$key] = $value;
                }
            }
            switch ($value_item['type']) {
                case 'hidden':
                    echo Form::hidden($item, $value_item['default_value']);
                    break;

                case 'text':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::input($item, $value_item['default_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;

                case 'checkbox':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::checkbox($item, $value_item['default_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;

                case 'radio':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::radio($item, $value_item['default_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;

                case 'textarea':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::textarea($item, $value_item['default_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;

                case 'password':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::password($item, $value_item['default_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;

                case 'file':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::file($item, $value_item['default_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;

                case 'select':
                    echo ($value_item['label'] ? Form::label($value_item['label']) : '').Form::select($item, $value_item['default_value'], $value_item['select_value'], $style);
                    echo (isset($value_item['saut_de_ligne']) ? Html::br() : '');
                    break;
            }
        }

        echo Form::submit();
        echo Form::close();
    }
}