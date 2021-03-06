<?php
namespace Home\Controller;
use Org\Util\String;
use Think\Controller;
use Home\myLib\UserInfo;
use Think\Upload;

class IndexController extends CommonController {
    /**
     * 前台 用户中心
     */
    public function index(){
        if(is_null(session('stunum'))){
            $this->redirect('Home/Index/login');
        }
        $stunum = session('stunum');
        $userInfo = new UserInfo($stunum);
        $info = $userInfo->getSelfInfo();

        //用户基本信息
        $this->assign('nickName', $info['nickname']);
        $this->assign('selfRank', $userInfo->getSelfRank());
        $this->assign('selfScore', $info['score']);
        $this->assign('rankList', $userInfo->getRankList(4));
        $this->assign('headImage', $userInfo->getHeadImg());

        //我的中心
        $this->assign('userLog', $userInfo->getLog());  //所有动态
        $this->assign('BTdownLog', $userInfo->getLog(null,'BTdown铺'));
        $this->assign('marketLog', $userInfo->getLog(null,'拾货'));
        $this->assign('jsnsLog', $userInfo->getLog(null,'锦瑟南山'));
        $this->assign('zscyLog', $userInfo->getLog(null,'掌上重邮'));
        $this->assign('cyxbsLog', $userInfo->getLog(null,'微信'));

        //积分细则
        $this->assign('rule', $userInfo->getRule());
        $this->assign('BTdownRule', $userInfo->getRule('BTdown铺'));
        $this->assign('marketRule', $userInfo->getRule('拾货'));
        $this->assign('jsnsnRule', $userInfo->getRule('锦瑟南山'));
        $this->assign('zscyRule', $userInfo->getRule('掌上重邮'));
        $this->assign('cyxbsRule', $userInfo->getRule('微信'));

        //用户等级
        $this->assign('userLevel', $userInfo->getLevel());

        //积分等级
        $this->assign('levelRule', $userInfo->getLevelRule());
        //dd($userInfo->getLevelRule());

        //帮助中心文章
        $this->assign('help',$userInfo->getHelp());
        //获取消息中文章
        $this->assign('new',$userInfo->getNew());



        $this->display();
    }

    public function login(){
        $this->display();
    }

    public function signUp(){
        $this->display();
    }

    public function upload(){
        $this->display();
    }

    public function changeInfo(){
        if(IS_POST){
            $where['stu_num'] = session('stunum');
            $info['headimg'] = $this->savePic();
            $info['myshop'] = I('post.myshop');
            $info['mysign'] = I('post.mysign');
            $info['nickname'] = I('post.nickname');
            $res = M('user_member')->where($where)->save($info);
            if($res)
                $this->ajaxReturn(true);
            else
                $this->ajaxReturn(false);
        }else
            $this->ajaxReturn(false);
    }

    private function savePic(){
        $upload = new Upload();                      // 实例化上传类
        $upload->maxSize = 3145728;                         // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './RedCenter/Home/Public/head_img/';            // 设置附件上传根目录
        $upload->autoSub = false;
        $upload->replace = true;                        //存在同名图片就进行覆盖
        $upload->savePath = '';
        $upload->saveName = 'head_'.session('stunum');              // 设置上传文件名
        $info = $upload->uploadOne($_FILES['photo']);       //执行上传方法
        if (!$info) {                                       // 上传错误提示错误信息
                $this->error($upload->getError());
        } else {                                              // 上传成功 获取上传文件信息
            var_dump($info);
            return $info['savename'];
        }

    }

    public function changePass(){
        $old_pass = I('post.old_pass');
        $new_pass = I('post.new_pass');
        $conf_pass = I('post.conf_pass');
        $where['stu_num'] = session('stunum');
        $user = M('user_member')->where($where)->find();
        if(!$user['password']){   //password字段为空,说明没有修改过,密码仍是后5,6位
            if(substr($user['stu_idcard'],-6) == strtolower($old_pass) || substr($user['stu_idcard'],-5) == strtolower($old_pass)){
                if($new_pass == $conf_pass){
                    $str = new String();
                    $save['salt'] = $str->randString(6);
                    $save['password'] = md5(md5($new_pass).$save['salt']);
                    M('user_member')->where($where)->save($save);
                    $this->ajaxReturn(true);
                }
            }else
               $this->ajaxReturn(false);//原密码错误
        }else{
            if($user['password'] == md5(md5($old_pass).$user['salt']) ){
                if($new_pass == $conf_pass){
                    $save['password'] = md5(md5($new_pass).$user['salt']);
                    M('user_member')->where($where)->save($save);
                    $this->ajaxReturn(true);
                }
            }else
                $this->ajaxReturn(false);//原密码错误
        }

    }

    public function changeLink(){
        $res = D('Link')->changLink(I('post.type'),I('post.linkId'));
        if($res)
            $this->ajaxReturn(true);
        else
            $this->ajaxReturn(false);
    }

    public function linkInfo(){
//        $stunum = session('stunum');
//        $userInfo = new UserInfo($stunum);
        $userInfo = getUinfo();
        $linkInfo = $userInfo->getLink();
        $this->ajaxReturn($linkInfo);
    }

    public function getHelp(){
        $userInfo = getUinfo();
        $res = $userInfo->getHelp(I('post.page'));
        $this->ajaxReturn($res);
    }

    public function getNew(){
        $userInfo = getUinfo();
        $res = $userInfo->getNew(I('post.page'));
        $this->ajaxReturn($res);
    }

    public function basicInfo(){
        $userInfo = getUinfo();
        $info = $userInfo->getSelfInfo();
        $basicInfo['nickname'] = $info['nickname'];
        $basicInfo['headimg'] = $userInfo->getHeadImg();
        $basicInfo['myshop'] = $info['myshop'];
        $basicInfo['mysign'] = $info['mysign'];
        $this->ajaxReturn($basicInfo);
    }


    public function test(){

        //$res = $userInfo->getLink();

        //取帮助文章
        //var_dump($userInfo->getHelp(2));

        //取未读帮助数目
        //var_dump($userInfo->newHelpNum());

        //取消息
        //var_dump($userInfo->getNew());

        //取未读消息数目
        //var_dump($userInfo->newNewsNum());
    }

    public function index2(){
        if(is_null(session('stunum'))){
            $this->redirect('Home/Index/login');
        }
        $stunum = session('stunum');
        $userInfo = new UserInfo($stunum);

        $info = $userInfo->getSelfInfo();
        $newHelpNum = $userInfo->newHelpNum();
        $newNewsNum = $userInfo->newNewsNum();
        $linkInfo = $userInfo->getLink();
        $all_scores = $userInfo->getAllScore();

        $this->assign('info',$info);
        $this->assign('newHelpNum',$newHelpNum);
        $this->assign('newNewsNum',$newNewsNum);
        $this->assign('linkNum',count($linkInfo['linked']));
        $this->assign('all_scores',$all_scores);

        $this->display();
    }
}