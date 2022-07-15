<template>
    <example-component></example-component>
</template>

<script>
import ExampleComponent from './components/ExampleComponent.vue';
export default {
    name : 'App',
    components : {
        'example-component' : ExampleComponent
    }
}
</script>