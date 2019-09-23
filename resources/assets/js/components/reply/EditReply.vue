<template>
    <v-container>
        <vue-simplemde v-model="reply.reply" ref="markdownEditor" />
                

        <v-card-actions >
            <v-btn icon color="green"  type="submit">
                <v-icon>save</v-icon>
            </v-btn>
            <v-btn icon color="red" @click="cancel">
                <v-icon>cancel</v-icon>
            </v-btn>
        </v-card-actions>
    </v-container>
</template>
<script>
export default {
    props:['reply'],
}
</script>