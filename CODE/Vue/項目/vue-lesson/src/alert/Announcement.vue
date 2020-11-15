<template>
    <!-- 加入一個彈窗 -->
    <div class="alert alert-info">{{ msg }}</div>
</template>
<script>
export default {
    // 以下爲ES6的函數寫法，即省略了“: function”
    data() {
        return {
            msg: "這是一個頁面"
        }
    }
}
</script>