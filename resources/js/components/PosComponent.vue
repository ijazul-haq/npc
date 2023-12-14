<template>
  <div>
    <h4 class="fw-bold text-center text-muted my-4">Part of Speach</h4>
    <div class="form-check">
      <input
        class="form-check-input"
        id="checkNoun"
        type="radio"
        name="postype"
        value="n"
        :checked="posType === 'n' ? 'checked' : ''"
        data-bs-toggle="collapse"
        href="#collapseNoun"
        @change='onCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkNoun"
        ><b>Noun</b></label
      >
    </div>
    <div :class="{show: posType ==='n'}" class="collapse" id="collapseNoun">
      <div class="card my-2 p-2">
        <table>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="numberSingular"
                  value="sn"
                  data-parent = 'n'
                  :checked="pos === 'sn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="numberSingular"
                  >Singular</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="numberPlural"
                  value="pn"
                  data-parent = 'n'
                  :checked="pos === 'pn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="numberPlural"
                  >Plural</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="verbCommon"
                  value="cn"
                  data-parent = 'n'
                  :checked="pos === 'cn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="verbCommon"
                  >Common</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="verbProper"
                  value="pn"
                  data-parent = 'n'
                  :checked="pos === 'pn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="verbProper"
                  >Proper</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'n'
                  id="genderMasculine"
                  value="mn"
                  :checked="pos === 'mn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="genderMasculine"
                  >Masculine</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'n'
                  id="genderFeminine"
                  value="fn"
                  :checked="pos === 'fn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="genderFeminine"
                  >Feminine</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="nounDirect"
                  data-parent = 'n'
                  value="dn"
                  :checked="pos === 'dn' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="nounDirect"
                  >Direct</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="nounOblique"
                  data-parent = 'n'
                  value="on"
                  :checked="pos === 'on' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="nounOblique"
                  >Oblique</label
                >
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="form-check">
      <input
        class="form-check-input"
        id="checkVerb"
        type="radio"
        name="postype"
        value="v"
        :checked="posType === 'v' ? 'checked' : ''"
        data-bs-toggle="collapse"
        href="#collapseVerb"
        @change='onCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkVerb"
        ><b>Verb</b></label
      >
    </div>
    <div :class="{show: posType ==='v'}" class="collapse" id="collapseVerb">
      <div class="card my-2 p-2">
        <table>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="presentVerb"
                  data-parent = 'v'
                  value="vs"
                  :checked="pos === 'vs' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="presentVerb"
                  >Present Verb</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="pastVerb"
                  data-parent = 'v'
                  value="vt"
                  :checked="pos === 'vt' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="pastVerb"
                  >Past Verb</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="verbInfinitive"
                  data-parent = 'v'
                  value="vi"
                  :checked="pos === 'vi' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="verbInfinitive"
                  >Infinitive Verb</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="verbProper"
                  data-parent = 'v'
                  value="va"
                  :checked="pos === 'va' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="verbProper"
                  >Auxiliary Verb</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'v'
                  id="verbPresentCopula"
                  value="vsc"
                  :checked="pos === 'vsc' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="verbPresentCopula"
                  >Present Copula Verb</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'v'
                  id="verbPastCopula"
                  value="vtc"
                  :checked="pos === 'vtc' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="verbPastCopula"
                  >Past Copula Verb</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'v'
                  id="futureParticle"
                  value="pf"
                  :checked="pos === 'pf' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="futureParticle"
                  >Future Particle</label
                >
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="form-check">
      <input
        class="form-check-input"
        id="checkPronoun"
        type="radio"
        name="postype"
        value="p"
        :checked="posType === 'p' ? 'checked' : ''"
        data-bs-toggle="collapse"
        href="#collapsePronoun"
        @change='onCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkPronoun"
        ><b>Pronoun</b></label
      >
    </div>
    <div :class="{show: posType ==='p'}" class="collapse" id="collapsePronoun">
      <div class="card my-2 p-2">
        <table>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="personalNoun"
                  value="pp"
                  data-parent = 'p'
                  :checked="pos === 'pp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="personalNoun"
                  >Personal Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'p'
                  id="possessivePronoun"
                  value="pep"
                  :checked="pos === 'pep' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="possessivePronoun"
                  >Possessive Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="demPronoun"
                  data-parent = 'p'
                  value="dp"
                  :checked="pos === 'dp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="demPronoun"
                  >Demonstrative Pronoun</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="indPronoun"
                  data-parent = 'p'
                  value="ip"
                  :checked="pos === 'ip' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="indPronoun"
                  >Indefinite Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="refPrnoun"
                  data-parent = 'p'
                  value="rp"
                  :checked="pos === 'rp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="refPrnoun"
                  >Reflexive Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="recPronoun"
                  data-parent = 'p'
                  value="rlp"
                  :checked="pos === 'rlp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="recPronoun"
                  >Reciprocal Pronoun</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="intPronoun"
                  data-parent = 'p'
                  value="ivp"
                  :checked="pos === 'ivp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="intPronoun"
                  >Intensive Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="interrPronoun"
                  data-parent = 'p'
                  value="igep"
                  :checked="pos === 'igep' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="interrPronoun"
                  >Interrogative Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="relPronoun"
                  data-parent = 'p'
                  value="rep"
                  :checked="pos === 'rep' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="relPronoun"
                  >Relative Pronoun</label
                >
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="direcPronoun"
                  data-parent = 'p'
                  value="dlp"
                  :checked="pos === 'dlp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="direcPronoun"
                  >Directional Pronoun
                </label>
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  id="cliticPronoun"
                  data-parent = 'p'
                  value="cp"
                  :checked="pos === 'cp' ? 'checked' : ''"
                  @change='innerClick($event)'
                />
                <label
                  class="form-check-label pb-1 ps-2 pe-4"
                  for="cliticPronoun"
                  >Clitic Pronoun</label
                >
              </div>
            </td>
            <td>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="pos"
                  data-parent = 'p'
                  id="distPronoun"
                  :checked="pos === 'dbep' ? 'checked' : ''"
                  @change='innerClick($event)'
                  value="dbep"
                />
                <label class="form-check-label pb-1 ps-2 pe-4" for="distPronoun"
                  >Distributive Pronoun</label
                >
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="form-check">
      <input
        class="form-check-input pos"
        id="checkPre"
        type="radio"
        name="pos"
        value="pre"
        :checked="pos === 'pre' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkPre"
        ><b>Preposition</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input pos"
        id="checkPost"
        type="radio"
        name="pos"
        value="post"
        :checked="pos === 'post' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkPost"
        ><b>Postposition</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input pos"
        id="checkNum"
        type="radio"
        name="pos"
        value="num"
        :checked="pos === 'num' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkNum"
        ><b>Numeral</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input pos"
        id="checkInt"
        type="radio"
        name="pos"
        value="int"
        :checked="pos === 'int' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkInt"
        ><b>Interjection </b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input pos"
        id="checkConj"
        type="radio"
        name="pos"
        value="conj"
        :checked="pos === 'conj' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkConj"
        ><b>Conjunction </b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        id="checkAdv"
        type="radio"
        name="pos"
        value="adv"
        :checked="pos === 'adv' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkAdv"
        ><b>Adverb</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        id="checkAdj"
        type="radio"
        name="pos"
        value="adj"
        :checked="pos === 'adj' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkAdj"
        ><b>Adjectives</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        id="checkFw"
        type="radio"
        name="pos"
        value="fw"
        :checked="pos === 'fw' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkFw"
        ><b>Foreign Word</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        id="checkAbb"
        type="radio"
        name="pos"
        value="abb"
        :checked="pos === 'abb' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkAbb"
        ><b>Abbreviation</b></label
      >
    </div>
    <div class="form-check">
      <input
        class="form-check-input"
        id="checkSym"
        type="radio"
        name="pos"
        value="sym"
        :checked="pos === 'sym' ? 'checked' : ''"
        @change='aloneCheck($event)'
      />
      <label class="form-check-label pb-1 ps-2 pe-4" for="checkSym"
        ><b>Symbol</b></label
      >
    </div>
  </div>
</template>
<script>
export default {
  watch: {
  },
  created () {
  },
  
  data() {
    return {
      posType: '',
      pos: '',
        
    };
  },
  methods: {
    onCheck (e) {
      if(e.target.checked == true){
        this.posType = e.target.value;
        this.pos = ''
      } else {
        this.posType = ''
      }
    },
    aloneCheck (e) {
      if(e.target.checked == true){
        this.pos = e.target.value;
        this.posType = ''
      } else {
        this.posType = ''
        this.pos = ''
      }
    },
    innerClick (e) {
      if(e.target.checked == true){
        this.pos = e.target.value;
        const parentValue = e.target.dataset.parent;
        this.posType = parentValue
      } else {
        this.pos = ''
      }
    },
  },
//   props: ["posType", "pos"],
  mounted() {
    let el = document.getElementById('oldPos');
    let el2 = document.getElementById('oldPostype');
    let pos = el.dataset.pos;
    let posType = el2.dataset.postype;
    if(!posType){
        if(pos.includes('n')){
            posType = 'n';
        }
        if(pos.includes('p')){
            posType = 'p';
        }
        if(posType.includes('v')){
            posType = 'v';
        }
    }
    this.pos = pos;
    this.posType = posType;
  },
};
</script>