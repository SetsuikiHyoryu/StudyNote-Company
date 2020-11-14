<template>
    <div class="container">
        <!-- 將以下div占完整行 -->
        <div class="col-sm">
            <app-announcement></app-announcement>

            <!-- 
                用全局方式寫入一個文章組件，其中存在：
                
                - 大標題
                - 發表時間
                - 内容主題
            -->
            <app-article></app-article>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>>