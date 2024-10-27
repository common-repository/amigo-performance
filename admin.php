<?php
/**
 * @package amigo-performance
 */
?>

<div class='amperf-header'>
    <h1 class='header-title'>
        <span
            class="dashicons dashicons-buddicons-activity amigoperf_icon"></span><?php esc_html_e($this->amigoPerf_PluginName,'amigo-performance'); ?>
        <span class="amigoperf_pluginversion">
            <?php esc_html_e(AMIGOPERF_PLUGIN_VERSION,'amigo-performance'); ?></span>
    </h1>
</div>

<div class="amperf-container">

    <div class="tab">
        <button class="tablinks active" onclick="openTab(event, 'basic')">Basic</button>
        <button class="tablinks" onclick="openTab(event, 'removeJs')">Remove Js</button>
        <button class="tablinks" onclick="openTab(event, 'removeCss')">Remove Css</button>
    </div>

    <!-- Tab content -->
    <div id="basic" class="tabcontent" style='display:block'>
        <form method="post" id="formid">

            <input type="hidden" name="<?php esc_html_e($this->amigoPerf_hfn,'amigo-peformance'); ?>"
                value="<?php esc_html_e('Y','amigo-performance'); ?>">

            <div class="cc-switcher">
                <span class='cc-action-name'>
                    <span><?php esc_html_e('Remove Query String','amigo-performance'); ?></span>
                </span>
                <label class="amigoPerf_lable switch">
                    <input type="checkbox" class="custom-control-input"
                        name="<?php esc_html_e($this->amigoPerf_rqs,'amigo-peformance'); ?>"
                        value="<?php  esc_html_e($this->amigoPerf_rqs_opt,'amigo-peformance'); ?>"
                        <?php checked($this->amigoPerf_rqs_opt == get_option($this->amigoPerf_rqs),true);?>>
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="cc-switcher">
                <span class='cc-action-name'>
                    <span><?php esc_html_e('Remove Emoji','amigo-performance'); ?></span>
                </span>
                <label class="amigoPerf_lable switch">
                    <input type="checkbox" class="custom-control-input"
                        name="<?php esc_html_e($this->amigoPerf_remoji,'amigo-peformance'); ?>"
                        value="<?php esc_html_e($this->amigoPerf_remoji_opt,'amigo-peformance'); ?>"
                        <?php checked($this->amigoPerf_remoji_opt == get_option($this->amigoPerf_remoji),true);?>>
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="cc-switcher">
                <span class='cc-action-name'>
                    <span><?php esc_html_e('Defer parsing of JavaScript','amigo-performance'); ?></span>
                </span>
                <label class="amigoPerf_lable switch">
                    <input type="checkbox" class="custom-control-input"
                        name="<?php esc_html_e($this->amigoPerf_defer,'amigo-peformance'); ?>"
                        value="<?php esc_html_e($this->amigoPerf_defer_opt,'amigo-peformance'); ?>"
                        <?php checked($this->amigoPerf_defer_opt == get_option($this->amigoPerf_defer),true);?>>
                    <span class="slider round"></span>
                </label>
            </div>

            <div class="cc-switcher">
                <span class='cc-action-name'>
                    <span><?php esc_html_e('Iframe Lazyload','amigo-performance'); ?></span>
                </span>
                <label class="amigoPerf_lable switch">
                    <input type="checkbox" class="custom-control-input"
                        name="<?php esc_html_e($this->amigoPerf_iframelazy,'amigo-peformance'); ?>"
                        value="<?php esc_html_e($this->amigoPerf_iframelazy_opt,'amigo-peformance'); ?>"
                        <?php checked($this->amigoPerf_iframelazy_opt == get_option($this->amigoPerf_iframelazy), true); ?>>
                    <span class="slider round"></span>
                </label>
            </div>

            <!-- New -->
            <div class="cc-switcher">
                <span class='cc-action-name'>
                    <span><?php esc_html_e('Image Lazyload','amigo-performance'); ?></span>
                </span>
                <label class="amigoPerf_lable switch">
                    <input type="checkbox" class="custom-control-input"
                        name="<?php esc_html_e($this->amigoPerf_lazyload,'amigo-performance'); ?>"
                        value="<?php esc_html_e($this->amigoPerf_lazyload_opt,'amigo-performance'); ?>"
                        <?php checked($this->amigoPerf_lazyload_opt == get_option($this->amigoPerf_lazyload), true); ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <!-- New -->

            <div class="cc-save-changes">
                <input class="cc-save-btn cc-btn" type="submit"
                    value="<?php esc_attr_e('Save Changes','Amigo-Performance') ?>" class="amperf-submitbtn"
                    name="submit">
            </div>

        </form>
    </div>

    <div id="removeJs" class="tabcontent">
        <div class="cc-table">
            <?php if (!empty(get_option('amigoPerf_nq_script'))):?>
                <table id='jsContainer'>
                    <tr>
                        <th><?php esc_html_e('S.no','amigo-peformance') ?></th>
                        <th><?php esc_html_e('Handle','amigo-peformance') ?></th>
                        <th><?php esc_html_e('Src','amigo-peformance') ?></th>
                    </tr>
                    <?php
                    array_unshift($this->amigoPerf_nqjs_array,"");
                    unset($this->amigoPerf_nqjs_array[0]);
                    for ($i = 1; $i <= count($this->amigoPerf_nqjs_array); $i++) {
                        echo '<tr><td><span><input onclick="getSelectedValues('."jsContainer".','."js_handle".')" type="checkbox" value='.$this->amigoPerf_nqjs_array[$i]['handle'].'></span> '.$i.'</td>';
                        echo '<td>'.$this->amigoPerf_nqjs_array[$i]['handle'].'</td>';
                        echo '<td>';
                        // Check if the 'src' key exists in the array element
                        if (isset($this->amigoPerf_nqjs_array[$i]['src'])) {
                            echo '<a href='.$this->amigoPerf_nqjs_array[$i]['src'].' target="_blank">'.$this->amigoPerf_nqjs_array[$i]['src'].'</a>';
                        } else {
                            echo 'N/A'; // Output N/A if 'src' key is undefined
                        }
                        echo '</td></tr>';
                    }
                    ?>
                </table>
            <?php else: esc_html_e('Refresh front page to see results.!','amigo-peformance'); endif; ?>
        </div>

        <div>
            <form method="post" id="formid">
                <h3 class='remove-title'>
                    <?php esc_html_e('Select your js handle form the table which you want to remove form Front Page','amigo-peformance') ?>
                </h3>
                <textarea class='remove-box' name="<?php esc_html_e('js_hadle','amigo-peformance') ?>" id="js_handle"
                    cols="100" rows="10" readonly value='<?php echo get_option('amigoPerf_save_nq_script'); ?>'><?php echo get_option('amigoPerf_save_nq_script'); ?></textarea>
                <div class='cc-save-changes'>
                    <input type="submit" value="Save" class='cc-btn cc-save-btn' name="enqueued_js_submit"
                        class="amperf-submitbtn">
                </div>
            </form>
        </div>
    </div>

    <div id="removeCss" class="tabcontent">
        <div class="cc-table">
            <?php if (!empty(get_option('amigoPerf_nq_style'))):?>
                <table id='cssContainer'>
                    <thead>
                        <tr>
                            <th><?php esc_html_e('S.no','amigo-peformance') ?></th>
                            <th><?php esc_html_e('Handle','amigo-peformance') ?></th>
                            <th><?php esc_html_e('Src','amigo-peformance') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    array_unshift($this->amigoPerf_nqcss_array,"");
                    unset($this->amigoPerf_nqcss_array[0]);
                    foreach ($this->amigoPerf_nqcss_array as $i => $css_item) {
                        echo '<tr><td><span><input onclick="getSelectedValues('."cssContainer".','."css_handle".')" type="checkbox" value='.$css_item['handle'].'></span> '.($i + 1).'</td>';
                        echo '<td>'.$css_item['handle'].'</td>';
                        echo '<td>';
                        // Check if the 'src' key exists in the array element
                        if (isset($css_item['src'])) {
                            echo '<a href='.$css_item['src'].' target="_blank">'.$css_item['src'].'</a>';
                        } else {
                            echo 'N/A'; // Output N/A if 'src' key is undefined
                        }
                        echo '</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            <?php else: esc_html_e('Refresh front page to see results.!','amigo-peformance'); endif; ?>
        </div>

        <div>
            <form method="post" id="formid">
                <h3 class='remove-title'>
                    <?php esc_html_e('Select your CSS handle form the table which you want to remove form Front Page','amigo-peformance') ?>
                </h3>
                <textarea class='remove-box' name="<?php esc_html_e('css_hadle','amigo-peformance') ?>" id="css_handle"
                    cols="100" rows="10"><?php echo get_option('amigoPerf_save_nq_style'); ?></textarea>
                <div class='cc-save-changes'>
                    <input type="submit" value="Save" class='cc-btn cc-save-btn' name="enqueued_css_submit"
                        class="amperf-submitbtn">
                </div>
            </form>
        </div>
    </div>

</div>