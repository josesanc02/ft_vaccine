<?php

/* Get random photo from usplash */
function getRandomPhoto() {
    $words = array( 'abet', 'abut', 'ache', 'alit', 'ante', 'arch', 'aver', 'avow', 'bach', 'back', 'bade', 'bail', 'bait', 'bake', 'bale', 'balk', 'ball', 'band', 'bang', 'bank', 'barb', 'bard', 'bare', 'barf', 'bark', 'base', 'bash', 'bask', 'bate', 'bawl', 'bead', 'beam', 'bean', 'bear', 'beat', 'beef', 'been', 'beep', 'bell', 'belt', 'bend', 'bent', 'bias', 'bide', 'biff', 'bike', 'bilk', 'bill', 'bind', 'bird', 'birl', 'birr', 'bite', 'bitt', 'blab', 'blat', 'bled', 'blew', 'blob', 'blot', 'blow', 'blub', 'blue', 'blur', 'boat', 'bode', 'body', 'boil', 'bolt', 'bomb', 'bond', 'bone', 'bong', 'bonk', 'book', 'boom', 'boot', 'bore', 'born', 'boss', 'bowl', 'brag', 'bray', 'bred', 'brew', 'brim', 'buck', 'buff', 'bulk', 'bull', 'bump', 'bung', 'bunk', 'bunt', 'buoy', 'burl', 'burn', 'burp', 'burr', 'bury', 'bush', 'busk', 'buss', 'bust', 'busy', 'butt', 'buzz', 'caca', 'cage', 'cake', 'calk', 'call', 'calm', 'came', 'camp', 'cane', 'cant', 'card', 'care', 'cart', 'case', 'cash', 'cast', 'cave', 'cede', 'cere', 'chap', 'char', 'chat', 'chaw', 'chid', 'chin', 'chip', 'chop', 'chug', 'chum', 'cite', 'clad', 'clam', 'clap', 'claw', 'clew', 'clip', 'clog', 'clop', 'clot', 'cloy', 'club', 'clue', 'coal', 'coat', 'coax', 'cock', 'code', 'coif', 'coil', 'coin', 'coke', 'comb', 'come', 'comp', 'cone', 'conk', 'cook', 'cool', 'coop', 'cope', 'copy', 'cord', 'core', 'cork', 'corn', 'cosh', 'cost', 'cowl', 'crab', 'cram', 'crap', 'crew', 'crib', 'crop', 'crow', 'cube', 'cuff', 'cull', 'curb', 'cure', 'curl', 'cuss', 'dado', 'damn', 'damp', 'dang', 'dare', 'darn', 'dart', 'dash', 'date', 'daub', 'dawn', 'daze', 'deal', 'deck', 'deed', 'deem', 'defy', 'deke', 'demo', 'dent', 'deny', 'dial', 'dice', 'died', 'diet', 'dike', 'dine', 'ding', 'disc', 'dish', 'disk', 'diss', 'dive', 'dock', 'doff', 'dole', 'done', 'doom', 'dope', 'doss', 'dote', 'dove', 'down', 'doze', 'drag', 'draw', 'drew', 'drip', 'drop', 'drub', 'drug', 'drum', 'duck', 'duel', 'dull', 'dump', 'dung', 'dunk', 'dupe', 'dusk', 'dust', 'earn', 'ease', 'echo', 'edge', 'edit', 'emit', 'envy', 'espy', 'etch', 'even', 'exit', 'face', 'fade', 'fail', 'fake', 'fall', 'fare', 'farm', 'fart', 'fast', 'fate', 'fawn', 'faze', 'fear', 'feed', 'feel', 'fell', 'felt', 'fend', 'fess', 'fete', 'feud', 'file', 'fill', 'film', 'find', 'fine', 'fink', 'fire', 'firm', 'fish', 'fist', 'fizz', 'flag', 'flap', 'flat', 'flaw', 'flay', 'fled', 'flee', 'flew', 'flex', 'flip', 'flit', 'flog', 'flop', 'flow', 'flub', 'flux', 'foal', 'foam', 'foil', 'fold', 'fond', 'fool', 'foot', 'ford', 'fork', 'form', 'foul', 'fowl', 'frag', 'frap', 'fray', 'free', 'fret', 'frit', 'fuel', 'full', 'fume', 'fund', 'funk', 'furl', 'fuse', 'fuss', 'futz', 'gain', 'gait', 'gall', 'game', 'gang', 'gaol', 'gape', 'garb', 'gash', 'gasp', 'gate', 'gave', 'gawk', 'gawp', 'gaze', 'gear', 'geld', 'gibe', 'gift', 'gild', 'gimp', 'gird', 'give', 'glom', 'glow', 'glue', 'glug', 'glut', 'gnaw', 'goad', 'golf', 'gone', 'gong', 'goof', 'gore', 'gown', 'grab', 'gray', 'grew', 'grey', 'grid', 'grin', 'grip', 'grit', 'grow', 'grub', 'gull', 'gulp', 'gush', 'gust', 'gybe', 'hack', 'hail', 'hale', 'halt', 'hand', 'hang', 'hare', 'hark', 'harm', 'harp', 'hash', 'hasp', 'hast', 'hate', 'hath', 'haul', 'have', 'hawk', 'haze', 'head', 'heal', 'heap', 'hear', 'heat', 'heed', 'heel', 'heft', 'held', 'helm', 'help', 'herd', 'hewn', 'hide', 'hike', 'hill', 'hint', 'hire', 'hiss', 'hive', 'hoax', 'hock', 'hold', 'hole', 'home', 'hone', 'honk', 'hood', 'hoof', 'hook', 'hoop', 'hoot', 'hope', 'horn', 'hose', 'host', 'hove', 'howl', 'huff', 'hulk', 'hull', 'hump', 'hung', 'hunt', 'hurl', 'hurt', 'hush', 'husk', 'hymn', 'hype', 'idle', 'inch', 'iron', 'itch', 'jack', 'jade', 'jail', 'jape', 'jazz', 'jeer', 'jell', 'jerk', 'jest', 'jibe', 'jilt', 'jinx', 'jive', 'join', 'joke', 'jolt', 'josh', 'juke', 'jump', 'junk', 'kayo', 'keel', 'keen', 'keep', 'kept', 'kern', 'kick', 'kill', 'kink', 'kiss', 'kite', 'knap', 'knew', 'knit', 'knot', 'know', 'lace', 'lack', 'laid', 'lain', 'lamb', 'lame', 'land', 'lard', 'lark', 'lash', 'last', 'laud', 'lave', 'laze', 'lead', 'leaf', 'leak', 'lean', 'leap', 'leer', 'left', 'lend', 'lent', 'levy', 'lick', 'lift', 'like', 'lilt', 'lime', 'limp', 'line', 'link', 'lisp', 'list', 'live', 'load', 'loaf', 'loan', 'lock', 'loft', 'loll', 'long', 'look', 'loom', 'loop', 'loot', 'lope', 'lord', 'lose', 'lost', 'lour', 'love', 'lube', 'luck', 'luff', 'luge', 'lull', 'lump', 'lure', 'lurk', 'lust', 'made', 'mail', 'maim', 'make', 'mark', 'mask', 'mate', 'maul', 'meet', 'meld', 'melt', 'mend', 'meow', 'mess', 'miff', 'milk', 'mime', 'mind', 'mine', 'miss', 'moan', 'mock', 'moor', 'moot', 'mope', 'move', 'muck', 'muff', 'muse', 'mush', 'must', 'mute', 'nail', 'name', 'near', 'neck', 'need', 'nest', 'nick', 'nock', 'nose', 'note', 'nuke', 'numb', 'obey', 'ogle', 'okay', 'omen', 'omit', 'ooze', 'open', 'oust', 'pace', 'pack', 'page', 'pain', 'pair', 'palm', 'pant', 'pare', 'park', 'part', 'pass', 'pave', 'pawn', 'peak', 'peal', 'peck', 'peek', 'peel', 'peep', 'peer', 'perk', 'pick', 'pile', 'pine', 'plan', 'plat', 'play', 'plod', 'plop', 'plot', 'plow', 'plug', 'pock', 'poke', 'pool', 'pore', 'pose', 'post', 'pour', 'pout', 'pray', 'prim', 'prod', 'prop', 'puff', 'pull', 'pulp', 'pump', 'purl', 'purr', 'push', 'putt', 'quip', 'quit', 'quiz', 'race', 'rage', 'raid', 'rain', 'rake', 'rang', 'rank', 'rant', 'rape', 'rate', 'raze', 'read', 'ream', 'reap', 'reef', 'reek', 'reel', 'rein', 'rely', 'rend', 'rent', 'rest', 'rice', 'ride', 'rile', 'ring', 'riot', 'rise', 'risk', 'rive', 'roam', 'roar', 'rock', 'rode', 'roil', 'roll', 'romp', 'roof', 'room', 'root', 'rope', 'rout', 'rove', 'ruin', 'rule', 'rush', 'rust', 'sack', 'said', 'sail', 'sale', 'salt', 'sass', 'sate', 'save', 'sawn', 'scab', 'scam', 'scan', 'scar', 'scat', 'scud', 'scum', 'seal', 'seam', 'seat', 'seed', 'seek', 'seem', 'seen', 'seep', 'sell', 'send', 'sent', 'sewn', 'shag', 'sham', 'shed', 'ship', 'shit', 'shoe', 'shoo', 'shop', 'shot', 'show', 'shun', 'shut', 'side', 'sift', 'sigh', 'sign', 'sing', 'sink', 'sire', 'site', 'size', 'skew', 'skid', 'skim', 'skin', 'skip', 'slab', 'slag', 'slam', 'slap', 'slat', 'slay', 'sled', 'slew', 'slid', 'slim', 'slip', 'slit', 'slog', 'slop', 'slot', 'slow', 'slue', 'slug', 'slum', 'slur', 'smut', 'snag', 'snap', 'snip', 'snow', 'snub', 'soak', 'soap', 'soar', 'sock', 'soil', 'sold', 'sole', 'solo', 'sort', 'sour', 'sown', 'spam', 'span', 'spar', 'spat', 'spay', 'sped', 'spew', 'spin', 'spit', 'spot', 'spud', 'spur', 'stab', 'stag', 'star', 'stay', 'stem', 'step', 'stet', 'stew', 'stir', 'stop', 'stow', 'stub', 'stud', 'stun', 'suck', 'suit', 'sulk', 'sung', 'sunk', 'surf', 'swab', 'swam', 'swap', 'swat', 'sway', 'swig', 'swim', 'swob', 'swot', 'swum', 'tack', 'tail', 'talc', 'talk', 'tame', 'tamp', 'tank', 'tape', 'task', 'taxi', 'team', 'tear', 'teem', 'tell', 'tend', 'tent', 'term', 'test', 'text', 'thaw', 'thin', 'thud', 'tick', 'tide', 'tile', 'tilt', 'time', 'ting', 'tint', 'tire', 'toil', 'told', 'toll', 'tone', 'took', 'tool', 'toot', 'tope', 'tore', 'torn', 'toss', 'tote', 'tour', 'tout', 'tram', 'trap', 'tree', 'trek', 'trim', 'trip', 'trod', 'trot', 'true', 'tube', 'tuck', 'tune', 'turf', 'turn', 'tusk', 'twin', 'twit', 'type', 'undo', 'urge', 'vamp', 'vary', 'veer', 'veil', 'vein', 'vend', 'vent', 'vest', 'veto', 'vide', 'view', 'visa', 'vise', 'void', 'vote', 'wade', 'waft', 'wage', 'wail', 'wait', 'wake', 'walk', 'wall', 'wane', 'want', 'ward', 'warm', 'warn', 'warp', 'wash', 'waul', 'wave', 'wawl', 'wean', 'wear', 'weed', 'weep', 'weld', 'well', 'welt', 'wend', 'went', 'wept', 'were', 'wert', 'wham', 'whap', 'whet', 'whip', 'whir', 'whiz', 'whop', 'will', 'wilt', 'wine', 'wink', 'wipe', 'wire', 'wish', 'wist', 'wive', 'woke', 'wolf', 'woof', 'word', 'wore', 'work', 'worm', 'worn', 'wove', 'wrap', 'writ', 'xray', 'yack', 'yank', 'yarn', 'yaup', 'yawn', 'yawp', 'yean', 'yell', 'yelp', 'yoke', 'yowl', 'zero', 'zest', 'zing', 'zone', 'zonk', 'zoom',
  );
    return 'https://source.unsplash.com/random/?'.array_rand($words, 1);
  }

/* Print the navbar and the hero section */
function printHero() {
    echo '
    <!-- Hero -->
    <div class="hero dark" data-theme="dark">
      <nav class="container-fluid">
        <ul>
          <li>
            <a href="/" class="contrast"><strong>42 Vaccine</strong></a
            >
          </li>
        </ul>
        <ul>
          <li>
            <details role="list" dir="rtl">
              <summary aria-haspopup="listbox" role="link" class="contrast">Payroll</summary>
              <ul role="listbox">
                <li><a href="/login.php">Login</a></li>
              </ul>
            </details>
          </li>
        </ul>
      </nav>
      <header class="container">
        <hgroup>
          <h1>Get the vaccine</h1>
          <h2>A classic company or blog layout with a sidebar</h2>
        </hgroup>
        <p>Now in your campus</p>
      </header>
    </div>
    <!-- ./ Hero -->
    ';
  }


  function printHeader($status_code) {
    if ($status_code == 200)
    header("HTTP/1.1 200 OK");
    else if ($status_code == 401)
    header("HTTP/1.1 401 Unauthorized");
    else if ($status_code == 500)
    header("HTTP/1.1 500 Internal server error");
    else if ($status_code == 503)
    header("HTTP/1.1 503 Service Unavailable");
    
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <title>Vaccine Test Site</title>
            <meta name="description" content="Vaccine Test Site"  />
            <link rel="stylesheet" href="/pico.css" />
            <link rel="stylesheet" href="/custom.css" />
        </head>
    <body>';
    /* Inject the hero section */
    printHero();
    
    /* Now we start main */
    echo '<main class="container">';
    
  }

 function printFooter() {
    echo '</main>
    <!-- ./ Main -->

    <!-- Subscribe -->
    <section aria-label="Subscribe example">
      <div class="container">
        <article>
          <hgroup>
            <h2>Subscribe</h2>
            <h3>Litora torquent per conubia nostra</h3>
          </hgroup>
          <form class="grid">
            <input
              type="text"
              id="firstname"
              name="firstname"
              placeholder="First name"
              aria-label="First name"
              required
            />
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email address"
              aria-label="Email address"
              required
            />
            <button type="submit" onclick="event.preventDefault()">Subscribe</button>
          </form>
        </article>
      </div>
    </section>
    <!-- ./ Subscribe -->

    <!-- Footer -->
    <footer class="container">
      <small
        >Built with <a href="https://picocss.com">Pico</a> •
        </small>
    </footer>
    <!-- ./ Footer -->

    <!-- Minimal theme switcher -->
    <script src="/minimal-theme-switcher.js"></script>
  </body>
</html>';
  }


  function printGenericError($string) {
    echo '
    <div class="grid">
    <section id="preview">
    <h2>Ooops, that\'s an error!</h2>
    <p> '.$string.' </p>
    </section>
    </div>
    ';
  }
?>