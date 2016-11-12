//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
<div class="iconfont icon-top" v-show="show" @click="goTop">&#xe611;</div>
</template>
<script>
  import $ from 'webpack-zepto';
  export default {
    replace: true,
    data() {
      return {
        show: false
      };
    },
    mounted() {
      $(window).on('scroll', () => {
        if ($(window).scrollTop() > 100) {
          this.show = true;
        } else {
          this.show = false;
        }
      });
    },
    beforeDestory() {
      $(window).off('scroll');
    },
    methods: {
      goTop() {
        $(window).scrollTop(0);
        this.show = false;
      }
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <div class="page-cover"
        v-if="show&&fixHead"
        @click="showMenus">
    </div>
    <header :class="{'show':show&&fixHead,'fix-header':fixHead,'no-fix':!fixHead}" id="hd">
      <div class="nv-toolbar">
        <div class="toolbar-nav"
            @click="openMenu"
            v-if="fixHead">
        </div>
        <span v-text="pageType"></span>
        <i class="num" v-if="messageCount > 0"> {{messageCount}}</i>
        <router-link to="/add">
          <i v-if="needAdd" v-show="!messageCount || messageCount <= 0"
            class="iconfont add-icon">&#xe60f;</i>
        </router-link>
      </div>
    </header>
    <nv-menu :show-menu="show"
      :page-type="pageType"
      :nick-name="nickname"
      :profile-url="profileimgurl"
      v-if="fixHead" ></nv-menu>
  </div>
</template>

<script>
  import $ from 'webpack-zepto';

  export default {
    replace: true,
    props: {
      pageType: String,
      fixHead: Boolean,
      messageCount: Number,
      needAdd: {
        type: Boolean,
        default: true
      }
    },
    data() {
      return {
        nickname: '',
        profileimgurl: '',
        show: false
      };
    },
    methods: {
      openMenu() {
        $('html, body, #page').addClass('scroll-hide');
        this.show = !this.show;
      },
      showMenus() {
        this.show = !this.show;
        $('html, body, #page').removeClass('scroll-hide');
      }
    },
    components: {
      'nvMenu': require('./menu.vue')
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div v-show="show" id="wxloading" class="wx_loading">
    <div class="wx_loading_inner">
      <i class="wx_loading_icon"></i>{{showTxt}}...
    </div>
  </div>
</template>
<script>
  export default {
    replace: true,
    props: ['showTxt', 'show']
  };
</script>

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <section id="sideBar" class="nav-list" :class="{'show':showMenu}">
    <user-info></user-info>
    <section class="list-ul">
      <router-link class="icon-quanbu iconfont item" :to="{'name':'list',query:{tab:'all'}}">全部</router-link>
      <router-link class="icon-hao iconfont item" :to="{'name':'list',query:{tab:'good'}}">精华</router-link>
      <router-link class="icon-fenxiang iconfont item" :to="{'name':'list',query:{tab:'share'}}">分享</router-link>
      <router-link class="icon-wenda iconfont item" :to="{'name':'list',query:{tab:'ask'}}">问答</router-link>
      <router-link class="icon-zhaopin iconfont item" :to="{'name':'list',query:{tab:'job'}}">招聘</router-link>
      <router-link class="icon-xiaoxi iconfont item line" :to="{'name':'message'}">消息</router-link>
      <router-link class="icon-about iconfont item" :to="{'name':'about'}">关于</router-link>
    </section>
  </section>
</template>
<script>
  export default {
    replace: true,
    props: ['showMenu', 'pageType', 'nickName', 'profileUrl'],
    components: {
      'userInfo': require('./user-info.vue')
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div id="wxAlert" class="wx_loading" v-show="show">
    <div class="wx_alert_inner" id="wx_alert_inner" v-text="content"></div>
  </div>
</template>
<script>
  export default {
    replace: true,
    props: ['content', 'show']
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>

  <section class="reply">
    <textarea id="content" rows="8" class="text"
      :class="{'err':hasErr}"
      v-model="content"
      placeholder='回复支持Markdown语法,请注意标记代码'>
    </textarea>
    <a class="button" @click="addReply">确定</a>
  </section>

</template>
<script>
  import $ from 'webpack-zepto';
  const utils = require('../libs/utils');
  const markdown = require('markdown').markdown;
  import {
    mapGetters
  } from 'vuex';

  export default {
    replace: true,
    props: ['topic', 'replyId', 'topicId', 'replyTo', 'show'],
    data() {
      return {
        hasErr: false,
        content: '',
        author_txt: '<br/><br/><a class="form" href="https://github.com/shinygang/Vue-cnodejs">I‘m webapp-cnodejs-vue</a>'
      };
    },
    computed: {
      ...mapGetters({
        userInfo: 'getUserInfo'
      })
    },
    mounted() {
      if (this.replyTo) {
        this.content = `@${this.replyTo} `;
      }
    },
    methods: {
      addReply() {
        if (!this.content) {
          this.hasErr = true;
        } else {
          let time = new Date();
          let linkUsers = utils.linkUsers(this.content);
          let htmlText = markdown.toHTML(linkUsers) + this.author_txt;
          let replyContent = $('<div class="markdown-text"></div>').append(htmlText)[0].outerHTML;
          let postData = {
            accesstoken: this.userInfo.token,
            content: this.content + this.author_txt
          };

          if (this.replyId) {
            postData.reply_id = this.replyId;
          }
          $.ajax({
            type: 'POST',
            url: `https://cnodejs.org/api/v1/topic/${this.topicId}/replies`,
            data: postData,
            dataType: 'json',
            success: (res) => {
              if (res.success) {
                this.topic.replies.push({
                  id: res.reply_id,
                  author: {
                    loginname: this.userInfo.loginname,
                    avatar_url: this.userInfo.avatar_url
                  },
                  content: replyContent,
                  ups: [],
                  create_at: time
                });
              }
              this.content = '';
              if (this.show) {
                this.show = '';
              }
            },
            error: (res) => {
              var error = JSON.parse(res.responseText);
              this.$alert(error.error_msg);
              return false;
            }
          });
        }
      }
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div class="user-info">
    <!-- 未登录 -->
    <ul class="login-no" v-if="!userInfo.loginname">
      <li class="login" @click="goEnter"><a >登录</a></li>
    </ul>
    <!-- 已登录 -->
    <div class="login-yes" v-if="userInfo.loginname" @click="goUser">
      <div class="avertar"><img v-if="userInfo.avatar_url" :src="userInfo.avatar_url"></div>
      <div class="info">
        <p v-if="userInfo.loginname" v-text="userInfo.loginname"></p>
      </div>
    </div>
  </div>
</template>
<script>
  import {
    mapGetters
  } from 'vuex';
  // import userStore from '../vuex/user';
  export default {
    replace: true,
    computed: {
      ...mapGetters({
        userInfo: 'getUserInfo'
      })
    },
    methods: {
      goEnter() {
        this.$router.push({
          name: 'login',
          query: {
            redirect: encodeURIComponent(this.$route.path)
          }
        });
      },
      goUser() {
        this.$router.push({
          name: 'user',
          params: {
            loginname: this.userInfo.loginname
          }
        });
      }
    }
  };
</script>


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div style="height: 100%;">
    <nv-head page-type="关于" :fix-head="true" :need-add="true" ></nv-head>
    
    <dl class="about-info">

      <dt>关于项目</dt>
      <dd>该项目是基于Cnodejs的api，采用vue.js重写的webapp。</dd>
    
      <dt>源码地址</dt>
      
      <dd>
        <a href="https://github.com/shinygang/Vue-cnodejs">
          https://github.com/shinygang/Vue-cnodejs</a>
      </dd>
      
      <dt>意见反馈</dt>
      <dd>
        <a href="https://github.com/shinygang/Vue-cnodejs/issues">
          发表意见或者提需求</a>
      </dd>
      
      <dt>当前版本</dt>
      <dd>V2.0</dd>

    </dl>
  </div>
</template>
<script>
  import nvHead from '../components/header.vue';
  export default {
    components: {
      nvHead
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <img class="index" src="../assets/images/index.png">
  </div>
</template>
<script>
  require('../assets/scss/iconfont/iconfont.css');
  require('../assets/scss/CV.scss');
  require('../assets/scss/github-markdown.css');

  export default {
    mounted() {
      setTimeout(() => {
        this.$router.push({
          name: 'list'
        });
      }, 2000);
    }
  };
</script>

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <!-- 全局header -->
    <nv-head :page-type="getTitleStr(searchKey.tab)"
        ref="head"
        :fix-head="true"
        :need-add="true">
    </nv-head>

    <section id="page">
      <!-- 首页列表 -->
      <ul class="posts-list">
        <li v-for="item in topics">
          <router-link :to="{name:'topic',params:{id:item.id}}">
          <h3 v-text="item.title"
              :class="getTabInfo(item.tab, item.good, item.top, true)"
              :title="getTabInfo(item.tab, item.good, item.top, false)">
          </h3>
          <div class="content">
            <img class="avatar" :src="item.author.avatar_url" />
            <div class="info">
              <p>
                <span class="name">
                  {{item.author.loginname}}
                </span>
                <span class="status" v-if="item.reply_count > 0">
                  <b>{{item.reply_count}}</b>
                  /{{item.visit_count}}
                </span>
              </p>
              <p>
                <time>{{item.create_at | getLastTimeStr(true)}}</time>
                <time>{{item.last_reply_at | getLastTimeStr(true)}}</time>
              </p>
            </div>
          </div>
          </router-link>
        </li>
      </ul>
    </section>
    <nv-top></nv-top>
  </div>
</template>

<script>
  import $ from 'webpack-zepto';
  import utils from '../libs/utils.js';
  import nvHead from '../components/header.vue';
  import nvTop from '../components/backtotop.vue';

  export default {
    filters: {
      getLastTimeStr(time, isFromNow) {
        return utils.getLastTimeStr(time, isFromNow);
      }
    },
    data() {
      return {
        scroll: true,
        topics: [],
        searchKey: {
          page: 1,
          limit: 20,
          tab: 'all',
          mdrender: true
        },
        searchDataStr: ''
      };
    },
    mounted() {
      if (this.$route.query && this.$route.query.tab) {
        this.searchKey.tab = this.$route.query.tab;
      }

      // 如果从详情返回并且之前存有对应的查询条件和参数
      // 则直接渲染之前的数据
      if (sessionStorage.searchKey && sessionStorage.tab === this.searchKey.tab) {
        this.topics = JSON.parse(sessionStorage.topics);
        this.searchKey = JSON.parse(sessionStorage.searchKey);
        this.$nextTick(() => $(window).scrollTop(sessionStorage.scrollTop));
      } else {
        this.getTopics();
      }
      // 滚动加载
      $(window).on('scroll', utils.throttle(this.getScrollData, 300, 1000));
    },
    beforeRouteLeave(to, from, next) {
      // 如果跳转到详情页面，则记录关键数据
      // 方便从详情页面返回到该页面的时候继续加载之前位置的数据
      if (to.name === 'topic') {
        // 当前滚动条位置
        sessionStorage.scrollTop = $(window).scrollTop();
        // 当前页面主题数据
        sessionStorage.topics = JSON.stringify(this.topics);
        // 查询参数
        sessionStorage.searchKey = JSON.stringify(this.searchKey);
        // 当前tab
        sessionStorage.tab = from.query.tab || 'all';
      }
      $(window).off('scroll');
      next();
    },
    beforeRouteEnter(to, from, next) {
      if (from.name !== 'topic') {
        // 页面切换移除之前记录的数据集
        if (sessionStorage.tab) {
          sessionStorage.removeItem('topics');
          sessionStorage.removeItem('searchKey');
          sessionStorage.removeItem('tab');
        }
      }
      next();
    },
    methods: {
      // 获取title文字
      getTitleStr(tab) {
        let str = '';
        switch (tab) {
          case 'share':
            str = '分享';
            break;
          case 'ask':
            str = '问答';
            break;
          case 'job':
            str = '招聘';
            break;
          case 'good':
            str = '精华';
            break;
          default:
            str = '全部';
            break;
        }
        return str;
      },
      // 获取不同tab的样式或者标题
      getTabInfo(tab, good, top, isClass) {
        return utils.getTabInfo(tab, good, top, isClass);
      },
      // 获取主题数据
      getTopics() {
        let params = $.param(this.searchKey);
        $.get('https://cnodejs.org/api/v1/topics?' + params, (d) => {
          this.scroll = true;
          if (d && d.data) {
            this.topics = d.data;
          }
        });
      },
      // 滚动加载数据
      getScrollData() {
        if (this.scroll) {
          let totalheight = parseInt($(window).height(), 20) + parseInt($(window).scrollTop(), 20);
          if ($(document).height() <= totalheight + 200) {
            this.scroll = false;
            this.searchKey.limit += 20;
            this.getTopics();
          }
        }
      }
    },
    watch: {
      // 切换页面
      '$route' (to, from) {
        // 如果是当前页面切换分类的情况
        if (to.query && to.query.tab) {
          this.searchKey.tab = to.query.tab;
        }
        this.searchKey.limit = 20;
        this.getTopics();
        // 隐藏导航栏
        this.$refs.head.show = false;
      }
    },
    components: {
      nvHead,
      nvTop
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div class="login-page">
    <nv-head page-type="登录">
    </nv-head>
    <section class="page-body">
      <div class="label">
        <input class="txt" type="text" placeholder="Access Token" v-model="token" maxlength="36">
      </div>
      <div class="label">
        <a class="button" @click="logon">登录</a>
      </div>
    </section>
  </div>
</template>

<script>
  import $ from 'webpack-zepto';
  import nvHead from '../components/header.vue';

  export default {
    data() {
      return {
        token: ''
      };
    },
    methods: {
      logon() {
        if (this.token === '') {
          this.$alert('令牌格式错误,应为36位UUID字符串');
          return false;
        }
        $.ajax({
          type: 'POST',
          url: 'https://cnodejs.org/api/v1/accesstoken',
          data: {
            accesstoken: this.token
          },
          dataType: 'json',
          success: (res) => {
            let user = {
              loginname: res.loginname,
              avatar_url: res.avatar_url,
              userId: res.id,
              token: this.token
            };
            sessionStorage.user = JSON.stringify(user);
            this.$store.dispatch('setUserInfo', user);
            let redirect = decodeURIComponent(this.$route.query.redirect || '/');
            this.$router.push({
              path: redirect
            });
          },
          error: (res) => {
            var error = JSON.parse(res.responseText);
            this.$alert(error.error_msg);
          }
        });
      }
    },
    components: {
      nvHead
    }
  };
</script>

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <nv-head page-type="消息" 
        :fix-head="true" 
        :show-menu="showMenu"
        :message-count="no_read_len" 
        :need-add="true" ></nv-head>
    <div class="page" >
      <ul class="tabs">
        <li class="item br" :class='{"selected":selectItem === 2}' @click="changeItem(2)">已读消息</li>
        <li class="item" :class='{"selected":selectItem === 1}' @click="changeItem(1)">
          未读消息
          <i class="iconfont read" v-show="no_read_len > 0"
            @click="markall">&#xe60c;</i>
        </li>
      </ul>
      <div class="message markdown-body" v-for="item in currentData">
        <section class="user">
          <img class="head" :src="item.author.avatar_url" />
          <div class="info">
            <span class="cl">
              <span class="name">{{item.author.loginname}}</span>
              <span class="name" v-if="item.type==='at'">在回复中@了您</span>
              <span class="name" v-if="item.type==='reply'">回复了您的话题</span>
            </span>
            <span class="cr">
              <span class="name" v-text="getLastTimeStr(item.reply.create_at, true)"></span>
            </span>
          </div>
        </section>
        <div class="reply_content" v-html="item.reply.content"></div>
        <router-link :to="{name:'topic',params:{id:item.topic.id}}">
          <div class="topic-title">
            话题：{{item.topic.title}}
          </div>
        </router-link>
      </div>
      <div class="no-data" v-show="noData">
        <i class="iconfont icon-empty">&#xe60a;</i>
        暂无数据!
      </div>
    </div>
  </div>
</template>
<script>
  import $ from 'webpack-zepto';
  import utils from '../libs/utils.js';
  import nvHead from '../components/header.vue';
  import {
    mapGetters
  } from 'vuex';

  export default {
    data() {
      return {
        showMenu: false,
        selectItem: 2,
        message: {},
        noData: false,
        currentData: [],
        no_read_len: 0
      };
    },
    computed: {
      ...mapGetters({
        userInfo: 'getUserInfo'
      })
    },
    mounted() {
      $.get('https://cnodejs.org/api/v1/messages?accesstoken=' + this.userInfo.token, (d) => {
        if (d && d.data) {
          this.message = d.data;
          this.no_read_len = d.data.hasnot_read_messages.length;
          if (d.data.hasnot_read_messages.length > 0) {
            this.currentData = d.data.hasnot_read_messages;
          } else {
            this.currentData = d.data.has_read_messages;
            this.selectItem = 2;
          }
          this.noData = this.currentData.length === 0;
        } else {
          this.noData = true;
        }
      });
    },
    methods: {
      // 切换tab
      changeItem(idx) {
        this.selectItem = idx;
        this.currentData = idx === 1 ? this.message.hasnot_read_messages : this.message.has_read_messages;
        this.noData = this.currentData.length === 0;
      },
      // 标记所有为已读
      markall() {
        $.post('https://cnodejs.org/api/v1/message/mark_all', {
          accesstoken: this.userInfo.token
        }, (d) => {
          if (d && d.success) {
            window.location.reload();
          }
        });
      },
      getLastTimeStr(date, friendly) {
        return utils.getLastTimeStr(date, friendly);
      }
    },
    components: {
      nvHead
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <nv-head page-type="主题"
      :show-menu="false"
      :fix-head="true"></nv-head>
    <div class="add-container">
      <div class="line">选择分类：
        <select class="add-tab" v-model="topic.tab">
          <option value="share">分享</option>
          <option value="ask">问答</option>
          <option value="job">招聘</option>
        </select>
        <a class="add-btn" @click="addTopic">发布</a>
      </div>
      <div class="line">
        <input class="add-title" v-model="topic.title"
            type="text" :class="{'err':err=='title'}"
            placeholder="标题，字数10字以上" max-length="100"/>
      </div>
      <textarea v-model="topic.content" rows="35" class="add-content"
        :class="{'err':err=='content'}"
        placeholder='回复支持Markdown语法,请注意标记代码'>
      </textarea>
    </div>
  </div>
</template>

<script>
  import $ from 'webpack-zepto';
  import nvHead from '../components/header.vue';
  import {
    mapGetters
  } from 'vuex';

  export default {
    data() {
      return {
        topic: {
          tab: 'share',
          title: '',
          content: ''
        },
        err: '',
        authorTxt: '<br/><br/><a class="from" href="https://github.com/shinygang/Vue-cnodejs">I‘m webapp-cnodejs-vue</a>'
      };
    },
    computed: {
      ...mapGetters({
        userInfo: 'getUserInfo'
      })
    },
    methods: {
      addTopic() {
        console.log(this.userInfo);
        let title = $.trim(this.topic.title);
        let contents = $.trim(this.topic.content);

        if (!title || title.length < 10) {
          this.err = 'title';
          return false;
        }
        if (!contents) {
          this.err = 'content';
          return false;
        }

        let postData = {
          ...this.topic,
          content: this.topic.content + this.authorTxt,
          accesstoken: this.userInfo.token
        };
        $.ajax({
          type: 'POST',
          url: 'https://cnodejs.org/api/v1/topics',
          data: postData,
          dataType: 'json',
          success: (res) => {
            if (res.success) {
              this.$router.push({
                name: 'list'
              });
            }
          },
          error: (res) => {
            let error = JSON.parse(res.responseText);
            this.$alert(error.error_msg);
            return false;
          }
        });
      }
    },
    components: {
      nvHead
    }
  };
</script>


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <nv-head page-type="主题"
        :show-menu="showMenu"
        :need-add="true"
        :fix-head="true">
    </nv-head>
    
    <div id="page"
        :class="{'show-menu':showMenu}"
        v-if="topic.title">

      <h2 class="topic-title" v-text="topic.title"></h2>
      <section class="author-info">
        <img class="avatar" :src="topic.author.avatar_url" />
        <div class="col">
          <span>{{topic.author.loginname}}</span>
          <time>
            发布于:{{topic.create_at | getLastTimeStr(true)}}
          </time>
        </div>
        <div class="right">
          <span class="tag"
              :class="getTabInfo(topic.tab, topic.good, topic.top, true)"
              v-text="getTabInfo(topic.tab, topic.good, topic.top, false)">
          </span>
          <span class="name">{{topic.visit_count}}次浏览</span>
        </div>
      </section>

      <section class='markdown-body topic-content' v-html="topic.content">

      </section>

      <h3 class="topic-reply">
        <strong>{{topic.reply_count}}</strong> 回复
      </h3>

      <section class="reply-list">
        <ul>
          <li v-for="item in topic.replies">
            <section class="user">
              <router-link :to="{name:'user',params:{loginname:item.author.loginname}}" >
                <img class="head" :src="item.author.avatar_url"/>
              </router-link>
              <div class="info">
                <span class="cl">
                  <span class="name" v-text="item.author.loginname"></span>
                  <span class="name mt10">
                    <span></span>
                    发布于:{{item.create_at | getLastTimeStr(true)}}</span>
                </span>
                <span class="cr">
                  <span class="iconfont icon"
                    :class="{'uped':isUps(item.ups)}"
                    @click="upReply(item)">&#xe608;</span>
                  {{item.ups.length}}
                  <span class="iconfont icon" @click="addReply(item.id)">&#xe609;</span>
                </span>
              </div>
            </section>
            <div class="reply_content" v-html="item.content"></div>
            <nv-reply :topic.sync="topic"
                :topic-id="topicId"
                :reply-id="item.id"
                :reply-to="item.author.loginname"
                :show.sync="curReplyId"
                v-if="userInfo.userId && curReplyId === item.id"></nv-reply>
          </li>
        </ul>
      </section>
      <nv-top></nv-top>
      <nv-reply v-if="userInfo.userId"
          :topic="topic"
          :topic-id="topicId">
      </nv-reply>
    </div>

    <div class='no-data' v-if="noData">
      <i class="iconfont icon-empty">&#xe60a;</i>
      该话题不存在!
    </div>
  </div>
</template>
<script>
  import $ from 'webpack-zepto';
  import utils from '../libs/utils.js';
  import nvHead from '../components/header.vue';
  import nvReply from '../components/reply.vue';
  import nvTop from '../components/backtotop.vue';
  import {
    mapGetters
  } from 'vuex';

  export default {
    data() {
      return {
        showMenu: false, // 是否展开左侧菜单
        topic: {}, // 主题
        noData: false,
        topicId: '',
        curReplyId: ''
      };
    },
    computed: {
      ...mapGetters({
        userInfo: 'getUserInfo'
      })
    },
    mounted() {
      // 隐藏左侧展开菜单
      this.showMenu = false;

      // 获取url传的tab参数
      this.topicId = this.$route.params.id;

      // 加载主题数据
      $.get('https://cnodejs.org/api/v1/topic/' + this.topicId, (d) => {
        if (d && d.data) {
          this.topic = d.data;
        } else {
          this.noData = true;
        }
      });
    },
    methods: {
      getTabInfo(tab, good = false, top, isClass) {
        return utils.getTabInfo(tab, good, top, isClass);
      },
      getLastTimeStr(time, ago) {
        return utils.getLastTimeStr(time, ago); //??? 和list.vue的用法区别
      },
      isUps(ups) {
        return $.inArray(this.userInfo.userId, ups) >= 0;
      },
      addReply(id) {
        this.curReplyId = id;
        if (!this.userInfo.userId) {
          this.$router.push({
            name: 'login',
            params: {
              redirect: encodeURIComponent(this.$route.path)
            }
          });
        }
      },
      upReply(item) {
        if (!this.userInfo.userId) {
          this.$route.router.go('/login?redirect=' + encodeURIComponent(this.$route.path));
        } else {
          $.ajax({
            type: 'POST',
            url: 'https://cnodejs.org/api/v1/reply/' + item.id + '/ups',
            data: {
              accesstoken: this.userInfo.token
            },
            dataType: 'json',
            success: (res) => {
              if (res.success) {
                if (res.action === 'down') {
                  let index = $.inArray(this.userInfo.userId, item.ups);
                  item.ups.splice(index, 1);
                } else {
                  item.ups.push(this.userInfo.userId);
                }
              }
            },
            error: (res) => {
              let error = JSON.parse(res.responseText);
              this.$alert(error.error_msg);
              return false;
            }
          });
        }
      }
    },
    components: {
      nvHead,
      nvReply,
      nvTop
    }
  };
</script>
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
<template>
  <div>
    <nv-head page-type="用户信息" :fix-head="true" :show-menu="false" :need-add="true" ></nv-head>
    <section class="userinfo">
      <img class="u-img" :src="user.avatar_url" /><br/>
      <span class="u-name" v-text="user.loginname"></span>
      <div class="u-bottom">
        <span class="u-time" v-text="getLastTimeStr(user.create_at, false)"></span>
        <span class="u-score">积分：{{user.score}}</span>
      </div>
    </section>
    <section class="topics">
      <ul class="user-tabs">
        <li class="item br" :class='{"selected":selectItem === 1}' @click="changeItem(1)">最近回复</li>
        <li class="item" :class='{"selected":selectItem === 2}' @click="changeItem(2)">最新发布</li>
      </ul>
      <div class="message" v-for="item in currentData">
        <section class="user">
          <router-link class="head" :to="{name:'user',params:{loginname:item.author.loginname}}">
            <img :src="item.author.avatar_url" />
          </router-link>
          <router-link class="info" :to="{name:'topic',params:{id:item.id}}">
            <div class="t-title">{{item.title}}</div>
            <span class="cl mt12">
              <span class="name">{{item.author.loginname}}</span>
            </span>
            <span class="cr mt12">
              <span class="name" v-text="getLastTimeStr(item.last_reply_at, true)"></span>
            </span>
          </router-link>
        </section>
      </div>
      <div class="no-data" v-show="currentData.length === 0">
        <i class="iconfont icon-empty">&#xe60a;</i>
        暂无数据!
      </div>
    </section>
  </div>
</template>
<script>
  import $ from 'webpack-zepto';
  import utils from '../libs/utils.js';
  import nvHead from '../components/header.vue';

  export default {
    data() {
      return {
        user: {},
        currentData: [],
        selectItem: 1
      };
    },
    mounted() {
      let loginname = this.$route.params.loginname;
      if (!loginname) {
        this.$alert('缺少用户名参数');
        this.$router.push({
          path: '/'
        });
        return false;
      }
      $.get('https://cnodejs.org/api/v1/user/' + loginname, (d) => {
        if (d && d.data) {
          let data = d.data;
          this.user = data;
          if (data.recent_replies.length > 0) {
            this.currentData = data.recent_replies;
          } else {
            this.currentData = data.recent_topics;
            this.selectItem = 2;
          }
        }
      });
    },
    methods: {
      // 切换tab
      changeItem(idx) {
        this.selectItem = idx;
        this.currentData = idx === 1 ? this.user.recent_replies : this.user.recent_topics;
      },
      getLastTimeStr(date, friendly) {
        return utils.getLastTimeStr(date, friendly);
      }
    },
    components: {
      nvHead
    }
  };
</script>