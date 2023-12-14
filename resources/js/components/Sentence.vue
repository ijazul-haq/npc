<template>
  <div class="card-body">
    <div class="sentence-item">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col opacity-50" style="text-align: right">
              Sentence ID: {{ sentId }} | {{ status }}
            </div>
          </div>
          <div class="row">
            <div class="col sentence">
              <div v-for="(word, index) in sent" :key="index">
                <div class="word">
                  <div class="remove-space">
                    <button type="button" class="btn btn-primary btn-sm" :class="isWordSelected &&
                      wordSelected.index === index &&
                      wordSelected.index > 0
                      ? ''
                      : 'd-none'
                      " @click="removeSpace">
                      >>
                    </button>
                  </div>
                  <div class="wordtoken" :class="isWordSelected && wordSelected.index === index ? 'selected' : ''" @click="selectWord($event, word, index)">
                    <div class="token"  :class="query===word[0]? 'highlight' : ''">{{ word[0] }}</div>
                    <div class="tag"  :class="query===word[1]? 'highlight' : ''">{{ word[1] }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-1" />
          <div class="row">
            <div class="col col-md-11 popupWindow">
              <select v-if="isWordSelected" name="mainType" id="" @change="selectInputHandler($event, 'MAIN')">
                <option value="">---POS---</option>
                <option value="NN" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'NN'
                  ? 'selected'
                  : ''
                  ">
                  Noun
                </option>
                <option value="PR" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'PR'
                  ? 'selected'
                  : ''
                  ">
                  Pronoun
                </option>
                <option value="VB" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'VB'
                  ? 'selected'
                  : ''
                  ">
                  Verb
                </option>
                <option value="JJ" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'JJ'
                  ? 'selected'
                  : ''
                  ">
                  Adjective
                </option>
                <option value="RB" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'RB'
                  ? 'selected'
                  : ''
                  ">
                  Adverb
                </option>
                <option value="UH" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'UH'
                  ? 'selected'
                  : ''
                  ">
                  Interjection
                </option>
                <option value="RP" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'RP'
                  ? 'selected'
                  : ''
                  ">
                  Particle
                </option>
                <option value="FX" :selected="isWordSelected && wordSelected.tag.split('.')[0] === 'FX'
                  ? 'selected'
                  : ''
                  ">
                  Affix
                </option>
                <option value="NB" :selected="wordSelected.tag.split('.')[0] === 'NB' ? 'selected' : ''
                  ">
                  Number
                </option>
                <option value="BA" :selected="wordSelected.tag.split('.')[0] === 'BA' ? 'selected' : ''
                  ">
                  به
                </option>
                <option value="CC" :selected="wordSelected.tag.split('.')[0] === 'CC' ? 'selected' : ''
                  ">
                  Conjunction
                </option>
                <option value="DT" :selected="wordSelected.tag.split('.')[0] === 'DT' ? 'selected' : ''
                  ">
                  Determiner
                </option>
                <option value="FW" :selected="wordSelected.tag.split('.')[0] === 'FW' ? 'selected' : ''
                  ">
                  Foregin Word
                </option>
                <option value="NG" :selected="wordSelected.tag.split('.')[0] === 'NG' ? 'selected' : ''
                  ">
                  Negation Particle
                </option>
                <option value="IN" :selected="wordSelected.tag.split('.')[0] === 'IN' ? 'selected' : ''
                  ">
                  Preposition
                </option>
                <option value="PT" :selected="wordSelected.tag.split('.')[0] === 'PT' ? 'selected' : ''
                  ">
                  Postposition
                </option>
                <option value="AB" :selected="wordSelected.tag.split('.')[0] === 'AB' ? 'selected' : ''
                  ">
                  Abbreviation
                </option>
                <option value="PU" :selected="wordSelected.tag.split('.')[0] === 'PU' ? 'selected' : ''
                  ">
                  Punctuation
                </option>
              </select>

              <select name="commonProper" id="" @change="selectInputHandler($event, 'CP')"
                v-if="wordSelected.tag.split('.')[0] === 'NN'">
                <option value="">---COMMON/PROPER---</option>
                <option value="C" :selected="wordSelected.tag.split('.')[1] === 'C' ? 'selected' : ''
                  ">
                  Common
                </option>
                <option value="P" :selected="wordSelected.tag.split('.')[1] === 'P' ? 'selected' : ''
                  ">
                  Proper
                </option>
              </select>

              <select name="Number" id="" @change="selectInputHandler($event, 'SP')" v-if="wordSelected.tag.split('.')[0] === 'NN' &&
                wordSelected.tag.split('.')[1] === 'C'
                ">
                <option value="">---NUMBER---</option>
                <option value="1" :selected="wordSelected.tag.split('.')[2] === '1' ? 'selected' : ''
                  ">
                  Singular
                </option>
                <option value="2" :selected="wordSelected.tag.split('.')[2] === '2' ? 'selected' : ''
                  ">
                  Plural
                </option>
              </select>

              <select name="Gender" id="" @change="selectInputHandler($event, 'MF')" v-if="wordSelected.tag.split('.')[0] === 'NN' &&
                wordSelected.tag.split('.')[1] === 'C' &&
                wordSelected.tag.split('.')[2] === '1'
                ">
                <option value="">---GENDER---</option>
                <option value="M" :selected="wordSelected.tag.split('.')[3] === 'M' ? 'selected' : ''
                  ">
                  Male
                </option>
                <option value="F" :selected="wordSelected.tag.split('.')[3] === 'F' ? 'selected' : ''
                  ">
                  Female
                </option>
              </select>

              <select name="verbTypes" @change="selectInputHandler($event, 'VT')" id=""
                v-if="wordSelected.tag.split('.')[0] === 'VB'">
                <option value="">---VERB TYPE---</option>

                <option value="P" :selected="wordSelected.tag.split('.')[1] === 'P' ? 'selected' : ''
                  ">
                  Present
                </option>

                <option value="D" :selected="wordSelected.tag.split('.')[1] === 'D' ? 'selected' : ''
                  ">
                  Past
                </option>

                <option value="PC" :selected="wordSelected.tag.split('.')[1] === 'PC' ? 'selected' : ''
                  ">
                  Copula (Present)
                </option>

                <option value="DC" :selected="wordSelected.tag.split('.')[1] === 'DC' ? 'selected' : ''
                  ">
                  Copula (Past)
                </option>

                <option value="PX" :selected="wordSelected.tag.split('.')[1] === 'PX' ? 'selected' : ''
                  ">
                  Auxilary (Present)
                </option>

                <option value="DX" :selected="wordSelected.tag.split('.')[1] === 'DX' ? 'selected' : ''
                  ">
                  Auxilary (Past)
                </option>
                <option value="INF" :selected="wordSelected.tag.split('.')[1] === 'INF' ? 'selected' : ''
                  ">
                  Infinitive
                </option>
                <option value="G" :selected="wordSelected.tag.split('.')[1] === 'G' ? 'selected' : ''
                  ">
                  Gerund
                </option>
                <option value="N" :selected="wordSelected.tag.split('.')[1] === 'N' ? 'selected' : ''
                  ">
                  Past Participle
                </option>
                <option value="IMP" :selected="wordSelected.tag.split('.')[1] === 'IMP' ? 'selected' : ''
                  ">
                  Imperitive
                </option>
                <option value="H" :selected="wordSelected.tag.split('.')[1] === 'H' ? 'selected' : ''
                  ">
                  Subjunctive
                </option>
              </select>

              <select name="pronounTypes" @change="selectInputHandler($event, 'PT')" id=""
                v-if="isWordSelected && wordSelected.tag.split('.')[0] === 'PR'">
                <option value="">---PRONOUNE TYPE---</option>
                <option value="C" :selected="wordSelected.tag.split('.')[1] === 'C' ? 'selected' : ''
                  ">
                  Clitic
                </option>
                <option value="DEM" :selected="wordSelected.tag.split('.')[1] === 'DEM' ? 'selected' : ''
                  ">
                  Demonstrative
                </option>
                <option value="DIS" :selected="wordSelected.tag.split('.')[1] === 'DIS' ? 'selected' : ''
                  ">
                  Distributive
                </option>
                <option value="P$" :selected="wordSelected.tag.split('.')[1] === 'P$' ? 'selected' : ''
                  ">
                  Posessive
                </option>
                <option value="P" :selected="wordSelected.tag.split('.')[1] === 'P' ? 'selected' : ''
                  ">
                  Personal
                </option>
                <option value="W" :selected="wordSelected.tag.split('.')[1] === 'W' ? 'selected' : ''
                  ">
                  Interrogative
                </option>
              </select>
              <select name="pronounPerson" @change="selectInputHandler($event, 'PP')" id="" v-if="isWordSelected &&
                wordSelected.tag.split('.')[0] === 'PR' &&
                wordSelected.tag.split('.')[1] === 'P'
                ">
                <option value="">---PERSON---</option>
                <option value="i" :selected="wordSelected.tag.split('.')[2] === 'i' ? 'selected' : ''
                  ">
                  1st Person
                </option>
                <option value="ii" :selected="wordSelected.tag.split('.')[2] === 'ii' ? 'selected' : ''
                  ">
                  2nd Person
                </option>
                <option value="iii" :selected="wordSelected.tag.split('.')[2] === 'iii' ? 'selected' : ''
                  ">
                  3rd Person
                </option>
              </select>

              <button @click="changeAll" v-if="isWordSelected" type="button" class="btn btn-sm btn-secondary"
                :disabled="isDisabled">
                Change All
              </button>
            </div>
            <div v-if="loading" class="col col-md-1">
              <div class="spinner-border text-success" style="display: inline-block" role="status">
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col d-flex justify-content-end">
          <button @click="submitHandler" type="button" class="btn btn-secondary m-1" :disabled="isDisabled">
            SAVE
          </button>
          <a type="button" class="btn btn-secondary m-1" @click="onSkip">
            SKIP
          </a>
          <a @click="onRemove" type="button" class="btn btn-secondary m-1">
            REMOVE
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["sentence", "baseurl", "csrf", "user", "query"],
  data() {
    return {
      tagObj: {
        noune: "N",
        pornoune: "",
      },
      message: "",
      loading: false,
      sent: [],
      sentId: "",
      status: "",
      isWordSelected: false,
      isDisabled: true,
      skipUrl: "",
      previouseUrl: "",
      removeUrl: "",
      sentenceStatus: 0,
      wordSelected: {
        tag: "",
        word: "",
        index: -1,
        isSpaceRemoved: false,
      },
      homographs: [],
    };
  },
  methods: {
    selectWord(e, word, index) {
      console.log("word selected");
      this.isWordSelected = true;
      this.wordSelected.word = word[0];
      this.wordSelected.tag = word[1];
      this.wordSelected.index = index;
      this.wordSelected.isSpaceRemoved = false;
    },
    removeSpace() {
      this.sentenceStatus =
        this.sentenceStatus == 3 || this.sentenceStatus == 4 ? 4 : 2;
      const preIndex = this.wordSelected.index - 1;
      let preWord = this.sent[preIndex][0];
      let completeWord = preWord + " " + this.wordSelected.word;
      this.sent[preIndex][0] = completeWord;
      this.sent.splice(this.wordSelected.index, 1);
      let newSelectedWord = {
        index: preIndex,
        word: completeWord,
        tag: this.sent[preIndex][1],
        isSpaceRemoved: true,
      };
      this.wordSelected = newSelectedWord;
      this.isDisabled = false;
    },
    deselect() {
      this.isWordSelected = false;
      this.wordSelected.word = "";
      this.wordSelected.tag = "";
      this.wordSelected.index = -1;
      this.wordSelected.isSpaceRemoved = false;
    },
    selectInputHandler(e, selecter) {
      this.sentenceStatus =
        this.sentenceStatus == 2 || this.sentenceStatus == 4 ? 4 : 3;
      this.isDisabled = false;
      const origionalTag = this.wordSelected.tag;
      let initialValueArr = this.wordSelected.tag
        ? this.wordSelected.tag.split(".")
        : ["-"];
      console.log(e.target.value, selecter);
      switch (selecter) {
        case "MAIN":
          switch (e.target.value) {
            case "NN":
              if (initialValueArr.length > 0) {
                initialValueArr.splice(0, initialValueArr.length, "NN");
              } else {
                initialValueArr = ["NN", "0", "M", "X"];
              }
              break;
            case "VB":
              if (initialValueArr.length > 0) {
                initialValueArr.splice(0, initialValueArr.length, "VB");
              } else {
                initialValueArr = ["VB", "INF"];
              }
              break;
            case "PR":
              if (initialValueArr.length > 0) {
                initialValueArr.splice(0, initialValueArr.length, "PR");
              } else {
                initialValueArr = ["PR", "DEM", "i"];
              }
              break;
            case "JJ":
              if (initialValueArr.length > 0) {
                initialValueArr.splice(0, initialValueArr.length, "JJ");
              } else {
                initialValueArr = ["JJ", "0", "M", "X"];
              }
              break;
            default:
              initialValueArr = [e.target.value];
              break;
          }
          break;
        case "SP":
          initialValueArr.splice(2, initialValueArr.length - 2, e.target.value);
          break;
        case "CP":
          initialValueArr.splice(1, initialValueArr.length - 1, e.target.value);
          break;
        case "DO":
          initialValueArr.splice(2, initialValueArr.length - 2, e.target.value);
          break;
        case "PP":
          initialValueArr.splice(2, initialValueArr.length - 2, e.target.value);
          break;
        case "MF":
          initialValueArr.splice(3, initialValueArr.length - 3, e.target.value);
          break;
        case "VT":
          initialValueArr.splice(1, initialValueArr.length - 1, e.target.value);
          break;
        case "PT":
          initialValueArr.splice(1, initialValueArr.length - 1, e.target.value);
          break;
        default:
          break;
      }
      const index = this.homographs.findIndex((obj) =>
        Object.values(obj).includes(this.wordSelected.word)
      );
      if (index !== -1) {
        this.homographs[index].new_tag = initialValueArr.join(".");
      } else {
        if (!this.wordSelected.isSpaceRemoved) {
          this.homographs.push({
            word: this.wordSelected.word,
            original_tag: origionalTag,
            new_tag: initialValueArr.join("."),
            sent_id: this.sentId,
          });
        }
      }

      this.sent[this.wordSelected.index][1] = initialValueArr.join(".");
      this.wordSelected.tag = initialValueArr.join(".");
      console.log(initialValueArr.join("."));
    },

    submitHandler() {
      let edited_by = this.sentence.edited_by;
      if (!edited_by.includes(this.user.id)) {
        edited_by = edited_by.length
          ? edited_by + `,${this.user.id}`
          : `${this.user.id}`;
      }
      const route = this.baseurl + "/sentence/edit/" + this.sentId;
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json; charset=UTF-8");
      myHeaders.append("X-CSRF-TOKEN", this.csrf);
      fetch(route, {
        method: "POST",
        headers: myHeaders,
        body: JSON.stringify({
          sentence: this.sent,
          status: this.sentenceStatus,
          homographs: this.homographs,
          edited_by,
        }),
      })
        .then((res) => {
          if (res.status === 200) {
            this.$emit("remove-item");
          }
        })
        .catch((err) => {
          alert("Somthing went wrong");
        });
    },

    changeAll() {
      this.loading = true;
      let edited_by = this.sentence.edited_by;
      if (!edited_by.includes(this.user.id)) {
        edited_by = edited_by.length
          ? edited_by + `,${this.user.id}`
          : `${this.user.id}`;
      }
      const route = this.baseurl + "/sentence/change_all";
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json; charset=UTF-8");
      myHeaders.append("X-CSRF-TOKEN", this.csrf);
      fetch(route, {
        method: "POST",
        headers: myHeaders,
        body: JSON.stringify({
          word: this.wordSelected,
        }),
      })
        .then((res) => {
          if (res.status === 200) {
            this.loading = false;
          }
        })
        .catch((err) => {
          alert("Somthing went wrong");
          this.loading = false;
        });
    },

    onSkip(e) {
      e.preventDefault();
      fetch(this.skipUrl, {
        method: "GET",
        headers: new Headers(),
      })
        .then((res) => {
          if (res.status === 200) {
            console.log(res);
            this.message = "Successfully updated.";
            this.loading = false;
            this.$emit("remove-item");
          }
        })
        .catch((err) => {
          alert("Somthing went wrong");
          this.loading = false;
        });
    },

    onRemove(e) {
      e.preventDefault();
      fetch(this.removeUrl, {
        method: "GET",
        headers: new Headers(),
      })
        .then((res) => {
          if (res.status === 200) {
            console.log(res);
            this.message = "Successfully updated.";
            this.loading = false;
            this.$emit("remove-item");
          }
        })
        .catch((err) => {
          alert("Somthing went wrong");
          this.loading = false;
        });
    },
  },
  mounted() {
    this.skipUrl = `${this.baseurl}/sentence/skip/${this.sentence.id}`;
    this.previouseUrl = `${this.baseurl}/sentence/previouse/${this.sentence.id}`;
    this.removeUrl = `${this.baseurl}/sentence/remove/${this.sentence.id}`;
    this.sentId = this.sentence.id;
    this.status=this.sentence.status
    this.sentenceStatus = this.sentence.status;
    this.sent = JSON.parse(this.sentence.sentence);
  },
};
</script>

<style></style>