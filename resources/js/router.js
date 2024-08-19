import { createRouter, createWebHistory } from 'vue-router';
import Home from './Pages/Website/Home.vue';
import About from './Pages/Website/About.vue';
import Blog from './Pages/Website/Blog.vue';
import Contact from './Pages/Website/Contact.vue';
import NeedHelp from './Pages/Website/NeedHelp.vue';
import Dashboard from './Pages/Admin/Dashboard.vue';
import HomeCURD from './Pages/Admin/HomeCURD.vue';
import AboutCURD from './Pages/Admin/AboutCURD.vue';
import ContactCURD from './Pages/Admin/ContactCURD.vue';
import MyProfile from './Pages/Admin/MyProfile.vue';


const routes = [
  { path: '/', component: Home, meta: { layout: 'website', title: 'Home Page' } },
  { path: '/about', component: About, meta: { layout: 'website', title: 'About Us' } },
  { path: '/blog', component: Blog, meta: { layout: 'website', title: 'Blog' } },
  { path: '/contact', component: Contact, meta: { layout: 'website', title: 'Contact' } },
  { path: '/need-help', component: NeedHelp, meta: { layout: 'website', title: 'NeedHelp' } },
  { path: '/admin', component: Dashboard, meta: { layout: 'Admin', title: 'Dashboard' } },
  { path: '/admin/home-curd', component: HomeCURD, meta: { layout: 'Admin', title: 'HomeCURD' } },
  { path: '/admin/about-curd', component: AboutCURD, meta: { layout: 'Admin', title: 'AboutCURD' } },
  { path: '/admin/contact-curd', component: ContactCURD, meta: { layout: 'Admin', title: 'ContactCURD' } },
  { path: '/admin/my-profile', component: MyProfile, meta: { layout: 'Admin', title: 'MyProfile' } },
];

export default function createAppRouter(appName) {
  const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  
  return router;
}
