const DataNavigationBody = [
  {
    text: '首页',
    routerName: 'Home',
    icon: 'home',
    children: [],
  },
  {
    text: '网站',
    routerName: 'Web',
    model: false,
    icon: 'public',
    children: [
      { icon: 'language', text: '综合' },
      { icon: 'functions', text: '理科' },
      { icon: 'account_circle', text: '博客' },
    ],
  },
  {
    text: '数据',
    routerName: 'Data',
    model: false,
    icon: 'archive',
    children: [
      { icon: 'insert_drive_file', text: '论文' },
      { icon: 'place', text: '地理' },
      { icon: 'attach_money', text: '财经' },
    ],
  },
  {
    text: '软件',
    routerName: 'Software',
    model: false,
    icon: 'widgets',
    children: [
      { icon: 'functions', text: '数理统计' },
      { icon: 'photo', text: '多媒体' },
      { icon: 'storage', text: '数据库' },
      { icon: 'settings', text: '系统工具' },
    ],
  },
  {
    text: '格言',
    routerName: 'Motto',
    model: false,
    icon: 'border_color',
    children: [],
  },
  {
    text: '关于',
    routerName: 'About',
    icon: 'info',
    children: [],
  },
];

export default DataNavigationBody;
