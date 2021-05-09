<template>
    <div>chat画面表示</div>
</template>

<script>
export default {
  name: 'Chat',
  props: ['room_id'],

  data () {
    return {
      roomId: this.room_id
    }
  },
  mounted() {
      console.log('Component mounted.')
  }
}
</script>