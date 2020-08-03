import Home from './components/Shared/HomeComponent.vue'
import Dashboard from './components/Shared/DashboardComponent.vue'
import BaseDashboard from './components/Shared/BaseDashboardComponent.vue'
import ViewProduct from './components/Product/view.vue'
import CreateProduct from './components/Product/create.vue'
import BaseProduct from './components/Product/base.vue'
import PreviewProduct from './components/Product/preview.vue'
import EditProduct from './components/Product/edit.vue'


export const routes = [
  { path: '', component: Home },

  {
    path: '/product',
    component: BaseProduct,
    children: [
          { path: '', component: ViewProduct },
          { path: 'view', component: ViewProduct },
          { path: 'create', component: CreateProduct },
          { path: 'edit/:id', component: EditProduct},
          { path: 'preview/:id', component: PreviewProduct},

    ]
  }
];
