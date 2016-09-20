<?php defined('IN_IA') or exit('Access Denied');?>
<script type="text/javascript" src="../addons/<?php  echo $this->modulename?>/template/js/jquery.form.js"></script>
<script  src="../addons/<?php  echo $this->modulename?>/template/js/designer.js" type="text/javascript"></script>
<script  src="../addons/<?php  echo $this->modulename?>/template/js/jquery.contextMenu.js" type="text/javascript"></script>
<link href="../addons/<?php  echo $this->modulename?>/template/js/jquery.contextMenu.css" rel="stylesheet">
<link href="../addons/<?php  echo $this->modulename?>/template/js/poster.css" rel="stylesheet">
<input type="hidden" name="reply_id" value="<?php  echo $item['id'];?>" />
<input type="hidden" name="rtype" value="1" />
<?php  load()->func('tpl')?>
<div class="main">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                服务号海报设置
            </div>
            <div class='panel-body'>
               <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">海报类型</label>
                    <div class="col-xs-12 col-sm-9">
                      <?php  if($_W['account']['level']==4) { ?>
                        <label class="radio-inline"><input type="radio" name="type" value="2" 
	         			 checked="checked">服务号海报</label>
                      <?php  } else { ?>
                        <label class="radio-inline"><input type="radio" name="type" value="3"
                         checked="checked">订阅号海报</label>
                      <?php  } ?>
                    </div>
                </div>
                <?php  if($_W['account']['level']==4) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">肯定好友</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline"><input type="radio" name="kdtype" value="1" 
	         			<?php  if($item['kdtype']==1) { ?> checked="checked" <?php  } ?>>开启</label>
                        <label class="radio-inline"><input type="radio" name="kdtype" value="0"
                        <?php  if($item['kdtype']==0) { ?> checked="checked"<?php  } ?>>不开启</label>
                    </div>
                </div>
                <?php  } else { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">肯定好友</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline"><input type="radio" name="kdtype" value="1" 
	         			 checked="checked">开启</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">不在活动地区</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline"><input type="radio" name="tztype" value="1" 
                         <?php  if($item['tztype']==1) { ?> checked="checked" <?php  } ?>>直接关闭窗口(参数里面必须开启位置限制功能)</label>
                        <label class="radio-inline"><input type="radio" name="tztype" value="0"
                         <?php  if(empty($item['tztype'])) { ?> checked="checked" <?php  } ?>>跳转到关注页面</label>
                          <span class="help-block">这里是粉丝粉分享海报的时候，粉丝关注，如果不在活动区域的控制【直接关闭窗口：就是不让粉丝关注公众号】</span>
                    </div>
                </div>
                <?php  } ?>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">肯定好友</label>
                    <div class="col-sm-11 col-xs-12">
                        <!--input type="text" class="form-control" value="<?php  echo $_W['siteroot'].str_replace('./','app/',$this->createMobileurl('kending',array('weid' => $item['weid'])))?>" readonly/-->
                        <input type="text" class="form-control" value="肯定好友" readonly/>
                       
                         <span class='help-block'>把【肯定好友】关键词加到自定义菜单，粉丝关注点击【肯定好友】才能获得积分</span>
                    </div>
                </div>
                <?php  if($_W['account']['level']<>4) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">引导关注页</label>
                    <div class="col-sm-11 col-xs-12">
                        <input type="text" id="tzurl" name="tzurl" class="form-control" placeholder=" http:// 订阅号引导关注页面---必需填写(扫描海报二维码，先跳转到这个页面引导关注)"  value="<?php  echo $item['tzurl'];?>" />
                    </div>
                </div>
                 <?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">海报名称</label>
                    <div class="col-sm-11 col-xs-12">
                        <input type="text" id="title" name="title" class="form-control"  value="<?php  echo $item['title'];?>" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-1 control-label">海报设计</label>
                    <div class="col-sm-11 col-xs-12">
                        <table style='width:100%;'>
                                <tr>
                                    <td id="bgtd" style='padding:10px;' valign='top'>
                                        <div id='tiger_poster'>
                                          <?php  if(!empty($item['bg'])) { ?>
                                          <img src="<?php  echo toimage($item['bg'])?>" class='bg'/>
                                          <?php  } ?>
                                          <?php  if(!empty($data)) { ?>
                                          <?php  if(is_array($data)) { foreach($data as $key => $d) { ?>
                                          <div class="drag" type="<?php  echo $d['type'];?>" index="<?php  echo $key+1?>" style="zindex:<?php  echo $key+1?>;left:<?php  echo $d['left'];?>;top:<?php  echo $d['top'];?>;
                                               width:<?php  echo $d['width'];?>;height:<?php  echo $d['height'];?>" size="<?php  echo $d['size'];?>" color="<?php  echo $d['color'];?>" > 
                                                <?php  if($d['type']=='img' || $d['type']=='thumb') { ?>
                                                  <img src="<?php  echo '../addons/'.$this->modulename.'/template/images/default.jpg'?>" />
                                                <?php  } else if($d['type']=='qr') { ?>
                                                  <img src="../addons/<?php  echo $this->modulename?>/template/images/qr.png" />
                                                <?php  } else if($d['type']=='name') { ?>
                                                   <div class=text style="font-size:<?php  echo $d['size'];?>;color:<?php  echo $d['color'];?>" >昵称</div> 
                                                <?php  } ?>
                                              <div class="dRightDown"> </div><div class="dLeftDown"> </div><div class="dRightUp"> </div><div class="dLeftUp"> </div><div class="dRight"> </div><div class="dLeft"> </div><div class="rUp"> </div><div class="rDown"></div>
                                          </div>
                                          <?php  } } ?> 
                                          <?php  } ?>
                                        </div>
                                        
                                    </td>
                                    <td valign='top' style='padding:10px;'>
                                          <div class='panel panel-default'>
                                              <div class='panel-body'>
                                                    <div class="form-group">
                                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">海报元素</label>
                                                        <div class="col-sm-9 col-xs-12">
                                                        	<button class='btn btn-info btn-poster' type='button' data-type='img' >头像</button>
                                                             <button class='btn btn-primary btn-poster' type='button' data-type='name'>昵称</button>
                                                             <button class='btn btn-warning btn-poster' type='button' data-type='qr' >二维码</button>
                                                        </div>
                                                    </div>
                                                  <div id='namesset' style='display:none'>
                                                  <div class="form-group">
                                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">昵称颜色</label>
                                                         <div class="col-sm-9 col-xs-12">
                                                              <?php  echo tpl_form_field_color('color')?>
                                                        </div>
                                                    </div>
                                                  <div class="form-group">
                                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">昵称大小</label>
                                                        <div class="col-sm-6">
                                                             <div class='input-group'>
                                                                 <input type="text" id="namesize" class="form-control namesize" placeholder="例如: 15"  />
                                                                 <div class='input-group-addon'>px</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                             </div>
                                             <div class="form-group" id="posterbg">
                                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">海报背景</label>
                                                    <div class="col-sm-9 col-xs-12">
                                                       <?php  echo tpl_form_field_image('bg',$item['bg'])?>
                                                       <span class='help-block'>海报背景大小建议尺寸为: 640 * 1008</span>
                                                    </div>
                                                </div>
                                          </div>
                                   </div>
                                    </td>
                                </tr>
                        </table>
                    </div>
                     </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                              
                             <div class="help-block" style="font-size:18px; color:#ff0000">修改海报之前先清空海报缓存：<a id="qingkong" style="cursor:pointer; font-size:30px;"><b>清空海报</b></a></div>
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">模版选择</label>
                    <div class="col-sm-9 col-xs-12">
                       <div class="radio">
                          <label>
                            <input type="radio" name="mbstyle" id="style1" value="style1"  <?php  if($item['mbstyle'] =='style1') { ?> checked<?php  } ?> >
                            模版1(经典版)
                          </label>
                       </div>
                       <div class="radio">
                          <label>
                            <input type="radio" name="mbstyle" id="style2" value="style2"  <?php  if(empty($item['mbstyle'])) { ?> checked="checked" <?php  } ?>  <?php  if($item['mbstyle'] =='style2') { ?> checked<?php  } ?>>
                            模版2(多颜色版，可以自定义颜色)
                          </label>
                       </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">模版颜色</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_color('mbcolor',$item['mbcolor'])?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">字体样式</label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="请填写 msyhbd.ttf 字体文件名" name="mbfont" value="<?php  echo $item['mbfont'];?>">
                             <div class="help-block">字体文件放在 /attachment/font/ 目录，字体格式为 .ttf ,字体名称必须为字母 <a href="http://pan.baidu.com/s/1hr07Rhy" target="_blank">字体库下载</a></div>
                        </div>
                </div>

                <input type="hidden" name="credit" value="0">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖励上限</label>
                    <div class="col-sm-9 col-xs-12">
                            <input min="0" type="number" class="form-control" placeholder="" name="mtips" value="<?php  echo $item['mtips'];?>">
                            <div class="help-block">当粉丝总积分或者总余额大于等于这个上限时，无法获得积分;0表示无上限</div>
                    </div>
                </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖励详情(填入数字)</label>
                <div class="col-sm-9 col-xs-12">
                       <div class="input-group" >
                          <div class="input-group-addon">首次关注</div>
                          <input type="number" name="score" value="<?php  echo $item['score'];?>" class="form-control" placeholder="填写数字" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2">积分</span>
                          <input type="text" name="scorehb" value="<?php  echo $item['scorehb'];?>" class="form-control" placeholder="填写数字" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2">元</span>
                       </div>
                       <div class="input-group" >
                          <div class="input-group-addon">二级奖励</div>
                          <input type="number" name="cscore" value="<?php  echo $item['cscore'];?>" class="form-control" placeholder="填写数字" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2">积分</span>
                          <input type="text" name="cscorehb" value="<?php  echo $item['cscorehb'];?>" class="form-control" placeholder="填写数字" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2">元</span>
                       </div>
                       <div class="input-group" >
                          <div class="input-group-addon">三级奖励</div>
                          <input type="number" name="pscore" value="<?php  echo $item['pscore'];?>" class="form-control" placeholder="填写数字" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2">积分</span>
                          <input type="text" name="pscorehb" value="<?php  echo $item['pscorehb'];?>" class="form-control" placeholder="填写数字" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2">元</span>
                       </div>
                </div>
            </div>

                <input type="hidden" name="sliders" value="0">
                <input type="hidden" name="gid" value="3">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首次生成图片文字提示</label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="" name="winfo1" value="<?php  echo $item['winfo1'];?>">
                           <span class="help-block">注意:#时间#为海报到期时间(例：你的海报将于#时间#失效，过期后请点击[生成海报]菜单生新获取哦。\n正在为您发送海报，请稍候……)</span>

                        </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首次次生成图片, 即将生成好文字提示</label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="" name="winfo2" value="<?php  echo $item['winfo2'];?>">
                           <span class="help-block">因为首次获取二维码需要的时间较久，在生成途中再次提示一下用户，避免用户没有耐心等待。不希望推送本条文字，可以不填写。二维码链接: #二维码链接#</span>

                        </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
                    <div class="col-sm-9 col-xs-12">
                <?php echo tpl_form_field_date('starttime', date('Y-m-d H:i:s',empty($item['starttime'])?time():$item['starttime']), true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">结束时间</label>
                    <div class="col-sm-9 col-xs-12">
                <?php echo tpl_form_field_date('endtime', date('Y-m-d H:i:s',empty($item['endtime'])?time()+3600*240:$item['endtime']), true)?> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 活动未开始提示语</label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="" name="nostarttips" value="<?php  echo $item['nostarttips'];?>">
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 活动已结束提示语</label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="" name="endtips" value="<?php  echo $item['endtips'];?>">
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排行榜显示人数</label>
                    <div class="col-sm-9 col-xs-12">
                         <input type="number" min="1" class="form-control" placeholder="" name="slideH" value="<?php  echo $item['slideH'];?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">取消关注</label>
                    <div class="col-sm-9 col-xs-12">
                    	<div class="input-group">
                    	<div class="input-group-addon">扣除上级积分</div>
                    	 <input type="number" min="-1" class="form-control" name="rscore" value="<?php  echo intval($item['rscore'])?>">
                    	</div>
                    	<div class="help-block">注意：0代表不扣积分；-1代表扣除他获取的积分； </div>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                    	<div class="input-group">
                    	 <div class="input-group-addon">通知上级提示语</div>
                    	 <input type="text" class="form-control" name="rtips" value="<?php  echo $item['rtips'];?>">
                    	</div>
                    	<div class="help-block"> #昵称#会取消关注者昵称；#积分#为扣除的积分；不填则并不通知(例：你的朋友#昵称#取消关注了，扣除您#积分#积分，扣#元#元)</div>
                    </div>
                </div>
                
            <div class="panel-body">
            <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"  />
                    </div>
            </div>
        	</div>
 		</div>
 </div>
  <div class="panel panel-default">
            <div class="panel-heading">
                文字自定义
            </div>
            <div class="panel-body">
                <div class="form-group">
                    	<label class="col-xs-12 col-sm-3 col-md-2 control-label">首次关注提示语</label>
                        <div class="col-sm-9">
                        	 <input type="text" class="form-control" placeholder="" name="ftips" value="<?php  echo $item['ftips'];?>">
                        	 <span class="help-block">提示：#积分#为粉丝获得的积分(例：恭喜您获得#积分#积分,获得#元#元)</span>
                        </div>
                </div>
                <div class="form-group">
                    	<label class="col-xs-12 col-sm-3 col-md-2 control-label">推广上级提示语</label>
                        <div class="col-sm-9">
                        	 <input type="text" class="form-control" placeholder="" name="utips" value="<?php  echo $item['utips'];?>">
                        	 <span class="help-block">提示：#积分#为粉丝获得的积分，#昵称#为其下级昵称(例：你的朋友#昵称#成为你的2级铁杆粉丝！恭喜您获得邀请奖励#积分#积分,获得#元#元)</span>
                        </div>
                </div>
            	<div class="form-group">
                    	<label class="col-xs-12 col-sm-3 col-md-2 control-label">推广上上级提示语</label>
                        <div class="col-sm-9">
                        	 <input type="text" class="form-control" placeholder="" name="utips2" value="<?php  echo $item['utips2'];?>">
                        	 <span class="help-block">提示：#积分#为粉丝获得的积分，#昵称#为其下级昵称(例：你朋友的朋友#昵称#成为你的3级铁杆粉丝！恭喜您获得邀请奖励#积分#积分,获得#元#元)</span>
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"  />
                    </div>
                </div>
            </div>
</div>


            
 <div class="panel panel-default">
            <div class="panel-heading">
                扫码关注后立即推送内容：
            </div>
            <div class="panel-body">
            	<div id="news" style="display: none;">
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
	                    <div class="col-sm-9 col-xs-12">
	                        <input type="text" id="title" name="stitle[]" class="form-control"  />
	                        <div class="help-block">注意：#昵称#为当前粉丝昵称</div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片链接</label>
	                    <div class="col-sm-9 col-xs-12">
	                        <?php  echo tpl_form_field_image('sthumb[]', '');?>
	                    </div>
	                </div>
	
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 说明</label>
	                    <div class="col-sm-9 col-xs-12">
	                        <input type="text" id="desc" name="sdesc[]" class="form-control"  />
	                    </div>
	                </div>
	
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转链接</label>
	                    <div class="col-sm-9 col-xs-12">
	                       <?php  echo tpl_form_field_link('surl[]','')?>
	                    </div>
	                </div>
	            </div>
                <?php  if(is_array($slist)) { foreach($slist as $l) { ?>
                <div class="news">
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
	                    <div class="col-sm-9 col-xs-12">
	                        <input type="text" id="title" name="stitle[]" class="form-control" value="<?php  echo $l['stitle'];?>"  />
	                        <div class="help-block">注意：#昵称#为当前粉丝昵称</div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片链接</label>
	                    <div class="col-sm-9 col-xs-12">
	                        <?php  echo tpl_form_field_image('sthumb[]', $l['sthumb']);?>
	                    </div>
	                </div>
	
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> 说明</label>
	                    <div class="col-sm-9 col-xs-12">
	                        <input type="text" id="desc" name="sdesc[]" class="form-control" value="<?php  echo $l['sdesc'];?>"  />
	                    </div>
	                </div>
	
	                <div class="form-group">
	                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转链接</label>
	                    <div class="col-sm-9 col-xs-12">
	                       <?php  echo tpl_form_field_link('surl[]',$l['surl'])?>
	                    </div>
	                </div>
                </div>
                <?php  } } ?>
                <div class="form-group">
                    	<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                        <div class="col-sm-9">
                        	<a onclick="onAdd2(this)" class="btn btn-warning"><i class="fa fa-plus"></i> 添加图文</a>
	                         <span class="help-block">图文数量大于1时，推送多图文，否则单图文；标题为空即为删除</span>
                        </div>
                </div>
            </div>
				</div>
<div class="panel panel-default setting">
	<div class="panel-heading">分享设置</div>
	<div class="panel-body">
            
            <div class="form-group">
	            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
	            <div class="col-sm-9 col-xs-12">
	               	<input type="text" class="form-control" name="sharetitle" value="<?php  if($item) { ?><?php  echo $item['sharetitle'];?><?php  } else { ?>免费领取积分，兑大奖！<?php  } ?>">
	            </div>
	        </div>	
	         <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图片</label>
                <div class="col-sm-9">
					<?php echo tpl_form_field_image('sharethumb',!empty($item)?$item['sharethumb']:"../addons/$this->modulename/icon.jpg");?>
				</div>
            </div>
	        <div class="form-group">
	            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享概述</label>
	            <div class="col-sm-9 col-xs-12">
	               	<input type="text" class="form-control" name="sharedesc" value="<?php  if($item) { ?><?php  echo $item['sharedesc'];?><?php  } else { ?>免费领取积分，兑大奖！<?php  } ?>">
	            </div>
	        </div>	
            <div class="form-group">
	            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享链接</label>
	            <div class="col-sm-9 col-xs-12">
	               	<input type="text" class="form-control" name="sharegzurl" value="<?php  echo $item['sharegzurl'];?>">
                    <span class="help-block">排行榜分享出去的是这个链接，这里可以填写，活动介绍页面，提醒粉丝关注参加活动</span>
	            </div>
	        </div>	
     </div>
     </div>
<input type="hidden" name="data" value="" />
</div>
<script  src="../addons/<?php  echo $this->modulename?>/template/js/poster.js" type="text/javascript"></script>
<script>

$('#qingkong').click(function(){
     	$.ajax({
     		url:"<?php  echo $this->createWebUrl('qingkong',array('pid'=>$item['id']))?>",
     		type:'post',
     		success:function(msg){
     			alert(msg);
     		}
     	});
     });

function onAdd(obj){
	var str = '<div class="form-group">';
	str += '<label class="col-xs-12 col-sm-3 col-md-2 control-label">验证问答</label>';
	str += '<div class="col-sm-9"><div class="input-group">';
	str += '<div class="input-group-addon">验证问题</div>';
	str += '<input type="text" class="form-control" name="ques[]">';
	str += '<div class="input-group-addon">验证答案</div>';
	str += '<input type="text" class="form-control" name="answer[]">';
	str += '</div></div></div>';
	$(obj).parent().parent().before(str);
}

function onAdd2(obj){
	$(obj).parent().parent().before('<div class="news">'+$('#news').html()+'</div>');
}

var gqrt = 0;
var attachurl = "<?php  echo $_W['attachurl'];?>";
var ncounter = 0;
    
         function tiger_bind(obj){
            var imgsset = $('#imgsset');
            var namesset = $("#namesset");
             imgsset.hide();
             namesset.hide();
             deleteTimers();
             var type = obj.attr('type');
             if(type=='name'){
                  namesset.show();
                  var size = obj.attr('size') || "16";
                  var picker = namesset.find('.sp-preview-inner');
                  var input = namesset.find('input:first');
                  var namesize = namesset.find('#namesize');
                  var color = obj.attr('color') || "#000";
                  input.val(color); namesize.val(size.replace("px",""));  
                  picker.css( {'background-color':color,'font-size':size});
                  ncounter = setInterval(function(){
                       obj.attr('color',input.val()).find('.text').css('color',input.val());
                       obj.attr('size',namesize.val() +"px").find('.text').css('font-size',namesize.val() +"px");
                   },100);
             }  
         }
         var bscounter = 0 ;        
    $(function(){
        <?php  if(!empty($item['id'])) { ?>
          $('.drag').each(function(){
              dragEvent($(this));
          })
        <?php  } ?>
          
        	  $('.btn-poster').click(function(){
                  var imgsset = $('#imgsset');
                  var namesset = $("#namesset");
                  imgsset.hide();
                  namesset.hide();
                  deleteTimers();
                   var type = $(this).data('type');
                   var img = "";
                 	if(type=='img' || type=='thumb'){
                       img = '<img src="../addons/<?php  echo $this->modulename?>/template/images/default.jpg" />';
                   }else if(type=='name'){
                       img = '<div class=text>昵称</div>';
                   }else if(type=='qr'){
                       img = '<img src="../addons/<?php  echo $this->modulename?>/template/images/qr.png" />';
                   }
                   var index = $('#tiger_poster .drag').length+1;
                   var obj = $('<div class="drag" type="' + type +'" index="' + index +'" style="z-index:' + index+'">' + img+'<div class="dRightDown"> </div><div class="dLeftDown"> </div><div class="dRightUp"> </div><div class="dLeftUp"> </div><div class="dRight"> </div><div class="dLeft"> </div><div class="rUp"> </div><div class="rDown"></div></div>');
                   $('#tiger_poster').append(obj);
                   dragEvent(obj);
               });
           
                $('.drag').click(function(){
                    tiger_bind($(this));
                })
            
    })
 var imgcounter = 0 ;   
     $(':submit').click(function(){
    	 if($.trim($('#title').val()) == ''){
            alert('请输入海报名称!');
            return false;
        }
        var poster = [];
        $('.drag').each(function(){
            var obj = $(this);
            var type = obj.attr('type');
            var left = obj.css('left');
            var top = obj.css('top');
            var d= {left:left,top:top,type:obj.attr('type'),width:obj.css('width'),height:obj.css('height')};
            if(type=='name'){
                d.size = obj.attr('size');
                d.color = obj.attr('color');
            }
            poster.push(d);
        });
        $('input[name="data"]').val( JSON.stringify(poster));
        return true;
    });
    </script>
