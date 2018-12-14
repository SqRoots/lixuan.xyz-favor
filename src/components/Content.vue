<template>
  <div>
    <div v-for="card in cards" xs12>
      <v-card
        d-flex xs12 order-xs5
        color="grey lighten-4"
        height="200px"
      >
        <v-toolbar color="grey darken-1" dark>
          <v-toolbar-side-icon></v-toolbar-side-icon>

          <v-menu :nudge-width="100">
            <v-toolbar-title slot="activator">
              <span>All</span>
              <v-icon dark>arrow_drop_down</v-icon>
            </v-toolbar-title>

            <v-list>
              <v-list-tile
                v-for="item in items"
                :key="item"
                @click=""
              >
                <v-list-tile-title v-text="item"></v-list-tile-title>
              </v-list-tile>
            </v-list>
          </v-menu>

          <v-spacer></v-spacer>

          <v-btn icon>
            <v-icon>search</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon>favorite</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon>more_vert</v-icon>
          </v-btn>
        </v-toolbar>
      </v-card>
      <br>
    </div>
  </div>
</template>

<script>
// import NavigationHead from './Content/ContentCard';

export default {
  name: 'Content',
  components: {

  },
  data() {
    return {
      cards: [1, 2, 3],
      items: ['abc', 'sdfdsf', 'asdf'],
      clipped: true,
      drawer: true,
      miniVariant: false,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
