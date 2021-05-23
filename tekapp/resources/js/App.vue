<template>
<div>
    <Navbar />
    <router-view />
</div>
  
</template>

<script>
import Navbar from './components/App/AppDrawer';
export default {
    name : 'app',
    components : 
    {
        Navbar
    }
}
</script>

