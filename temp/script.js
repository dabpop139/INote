import utils from './libs/utils';

/** 格式化时间
 *  @param {string} time 需要格式化的时间
 *  @param {bool} friendly 是否是fromNow
 */
exports.getLastTimeStr = (time, friendly) => {
	if (friendly) {
		return utils.MillisecondToDate(time);
	} else {
		return utils.fmtDate(new Date(time), 'yyyy-MM-dd hh:mm');
	}
};

/** 获取文字标签
 *  @param {string} tab Tab分类
 *  @param {bool} good 是否是精华帖
 *  @param {bool} top 是否是置顶帖
 */
exports.getTabStr = (tab, good, top) => {
	let str = '';
	if (top) {
		str = '置顶';
	} else if (good) {
		str = '精华';
	} else {
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
			default:
				str = '暂无';
				break;
		}
	}
	return str;
};

/** 获取标签样式
 *  @param {string} tab Tab分类
 *  @param {bool} good 是否是精华帖
 *  @param {bool} top 是否是置顶帖
 */
exports.getTabClassName = (tab, good, top) => {
	let className = '';

	if (top) {
		className = 'top';
	} else if (good) {
		className = 'good';
	} else {
		switch (tab) {
			case 'share':
				className = 'share';
				break;
			case 'ask':
				className = 'ask';
				break;
			case 'job':
				className = 'job';
				break;
			default:
				className = 'default';
				break;
		}
	}
	return className;
};
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
import Vue from 'vue';
import $ from 'webpack-zepto';
import VueRouter from 'vue-router';
import filters from './filters';
import routes from './routers';
import Alert from './libs/alert';
import store from './vuex/user';
import FastClick from 'fastclick';
Vue.use(VueRouter);
Vue.use(Alert);

$.ajaxSettings.crossDomain = true;

// 实例化Vue的filter
Object.keys(filters).forEach(k => Vue.filter(k, filters[k]));

// 实例化VueRouter
const router = new VueRouter({
	mode: 'history',
	routes
});
FastClick.attach(document.body);

// 处理刷新的时候vuex被清空但是用户已经登录的情况
if (sessionStorage.user) {
	store.dispatch('setUserInfo', JSON.parse(sessionStorage.user));
}

// 登录中间验证，页面需要登录而没有登录的情况直接跳转登录
router.beforeEach((to, from, next) => {
	// 处理左侧滚动不影响右边
	$('html, body, #page').removeClass('scroll-hide');
	if (to.matched.some(record => record.meta.requiresAuth)) {
		if (store.state.userInfo.userId) {
			next();
		} else {
			next({
				path: '/login',
				query: { redirect: to.fullPath }
			});
		}
	} else {
		next();
	}
});

new Vue({
	router,
	store
}).$mount('#app');
// require.ensure 是 Webpack 的特殊语法，用来设置 code-split point
const Home = resolve => {
	require.ensure(['./views/index.vue'], () => {
		resolve(require('./views/index.vue'));
	});
};

const List = resolve => {
	require.ensure(['./views/list.vue'], () => {
		resolve(require('./views/list.vue'));
	});
};

const routers = [{
	path: '/',
	name: 'home',
	component: Home
}, {
	path: '/cnodevue',
	name: 'cnodevue',
	component: Home
}, {
	path: '/list',
	name: 'list',
	component: List
}, {
	path: '/topic/:id',
	name: 'topic',
	component(resolve) {
		require.ensure(['./views/topic.vue'], () => {
			resolve(require('./views/topic.vue'));
		});
	}
}, {
	path: '/add',
	name: 'add',
	component(resolve) {
		require.ensure(['./views/new.vue'], () => {
			resolve(require('./views/new.vue'));
		});
	},
	meta: { requiresAuth: true }
}, {
	path: '/message',
	name: 'message',
	component(resolve) {
		require.ensure(['./views/message.vue'], () => {
			resolve(require('./views/message.vue'));
		});
	},
	meta: { requiresAuth: true }
}, {
	path: '/user/:loginname',
	name: 'user',
	component(resolve) {
		require.ensure(['./views/user.vue'], () => {
			resolve(require('./views/user.vue'));
		});
	}
}, {
	path: '/about',
	name: 'about',
	component(resolve) {
		require.ensure(['./views/about.vue'], () => {
			resolve(require('./views/about.vue'));
		});
	}
}, {
	path: '/login',
	name: 'login',
	component(resolve) {
		require.ensure(['./views/login.vue'], () => {
			resolve(require('./views/login.vue'));
		});
	}
}, {
	path: '*',
	component: Home
}];

export default routers;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
import Vue from 'vue';
import $ from 'webpack-zepto';

/**
 * 全局注册弱提示
 */
export default {
	install() {
		let timer = null;
		Vue.prototype.$alert = (msg) => {
			$('#alertWeek').remove();
			let $alert = $('<div class="week-alert" id="alertWeek"></div>');
			$('body').append($alert);
			$alert.html(msg);
			$alert.addClass('alert-show');
			clearTimeout(timer);
			timer = setTimeout(() => {
				$alert.remove();
			}, 2000);
		};
	}
};
'use strict';

import _ from 'lodash';
import Timeago from 'timeago.js';

let getCheck = {
	checkEmail(val) {
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (filter.test(val)) {
			return true;
		} else {
			return false;
		}
	},
	checkPhone(val) {
		var filter = /^1\d{10}$/;

		if (filter.test(val)) {
			return true;
		} else {
			return false;
		}
	}
};

/**
 * 从文本中提取出@username 标记的用户名数组
 * @param {String} text 文本内容
 * @return {Array} 用户名数组
 */
const fetchUsers = (text) => {
	if (!text) {
		return [];
	}

	var ignoreRegexs = [
		/```.+?```/g, // 去除单行的 ```
		/^```[\s\S]+?^```/gm, // ``` 里面的是 pre 标签内容
		/`[\s\S]+?`/g, // 同一行中，`some code` 中内容也不该被解析
		/^.*/gm, // 4个空格也是 pre 标签，在这里 . 不会匹配换行
		/\b\S*?@[^\s]*?\..+?\b/g, // somebody@gmail.com 会被去除
		/\[@.+?\]\(\/.+?\)/g // 已经被 link 的 username
	];

	ignoreRegexs.forEach((ignoreRegex) => {
		text = text.replace(ignoreRegex, '');
	});

	var results = text.match(/@[a-z0-9\-_]+\b/igm);
	var names = [];
	if (results) {
		for (var i = 0, l = results.length; i < l; i++) {
			var s = results[i];
			// remove leading char @
			s = s.slice(1);
			names.push(s);
		}
	}
	names = _.uniq(names);
	return names;
};

/**
 * 根据文本内容，替换为数据库中的数据
 * @param {String} text 文本内容
 * @param {Function} callback 回调函数
 */
const linkUsers = (text) => {
	var users = fetchUsers(text);
	for (var i = 0, l = users.length; i < l; i++) {
		var name = users[i];
		text = text.replace(new RegExp('@' + name + '\\b(?!\\])', 'g'), '[@' + name + '](/user/' + name + ')');
	}
	return text;
};

/**
 *   对Date的扩展，将 Date 转化为指定格式的String
 *   月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
 *   年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
 *   例子：
 *   (new Date()).Format('yyyy-MM-dd hh:mm:ss.S') ==> 2006-07-02 08:09:04.423
 *   (new Date()).Format('yyyy-M-d h:m:s.S')      ==> 2006-7-2 8:9:4.18
 */
const fmtDate = (date, fmt) => { // author: meizz
	var o = {
		'M+': date.getMonth() + 1, // 月份
		'd+': date.getDate(), // 日
		'h+': date.getHours(), // 小时
		'm+': date.getMinutes(), // 分
		's+': date.getSeconds(), // 秒
		'q+': Math.floor((date.getMonth() + 3) / 3), // 季度
		'S': date.getMilliseconds() // 毫秒
	};
	if (/(y+)/.test(fmt)) {
		fmt = fmt.replace(RegExp.$1, (date.getFullYear() + '').substr(4 - RegExp.$1.length));
	}
	for (var k in o) {
		if (new RegExp('(' + k + ')').test(fmt)) {
			fmt = fmt.replace(RegExp.$1, (RegExp.$1.length === 1) ? (o[k]) : (('00' + o[k]).substr(('' + o[k]).length)));
		}
	}
	return fmt;
};

/**
 * 调用Timeago库显示到现在的时间
 */
const MillisecondToDate = (time) => {
	var str = '';
	if (time !== null && time !== '') {
		let timeagoInstance = new Timeago();
		str = timeagoInstance.format(time, 'zh_CN');
	}
	return str;
};

/**
 * 格式化日期或时间
 * @param {string} time 需要格式化的时间
 * @param {bool} friendly 是否是fromNow
 */
exports.getLastTimeStr = (time, friendly) => {
	if (friendly) {
		return MillisecondToDate(time);
	} else {
		return fmtDate(new Date(time), 'yyyy-MM-dd hh:mm');
	}
};

/**
 * 获取不同tab的信息
 * @param  {[type]}  tab     [tab分类]
 * @param  {[type]}  good    [是否是精华]
 * @param  {[type]}  top     [是否置顶]
 * @param  {Boolean} isClass [是否是样式]
 * @return {[type]}          [返回对应字符串]
 */
exports.getTabInfo = (tab, good, top, isClass) => {
	let str = '';
	let className = '';
	if (top) {
		str = '置顶';
		className = 'top';
	} else if (good) {
		str = '精华';
		className = 'good';
	} else {
		switch (tab) {
			case 'share':
				str = '分享';
				className = 'share';
				break;
			case 'ask':
				str = '问答';
				className = 'ask';
				break;
			case 'job':
				str = '招聘';
				className = 'job';
				break;
			default:
				str = '暂无';
				className = 'default';
				break;
		}
	}
	return isClass ? className : str;
};

/**
 * 配置节流函数
 * @param  {[Function]}  fn     [要执行的函数]
 * @param  {[Number]}  delay    [延迟执行的毫秒数]
 * @param  {[Number]}  mustRun  [至少多久执行一次]
 * @return {[Function]}         [节流函数]
 */
exports.throttle = (fn, wait, mustRun) => {
	let timeout;
	let startTime = new Date();
	return function() {
		let context = this;
		let args = arguments;
		let curTime = new Date();

		clearTimeout(timeout);
		// 如果达到了规定的触发时间间隔，触发 handler
		if (curTime - startTime >= mustRun) {
			fn.apply(context, args);
			startTime = curTime;
			// 没达到触发间隔，重新设定定时器
		} else {
			timeout = setTimeout(fn, wait);
		}
	};
};

exports.linkUsers = linkUsers;
exports.fetchUsers = fetchUsers;
exports.getCheck = getCheck;
exports.fmtDate = fmtDate;
exports.MillisecondToDate = MillisecondToDate;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const userStore = new Vuex.Store({
	state: {
		userInfo: {}
	},
	getters: {
		getUserInfo(state) {
			return state.userInfo;
		}
	},
	mutations: {
		setUserInfo(state, userInfo) {
			state.userInfo = userInfo;
		}
	},
	actions: {
		setUserInfo({ commit }, user) {
			commit('setUserInfo', user);
		}
	}
});

export default userStore;