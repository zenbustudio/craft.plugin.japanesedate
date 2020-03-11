# Japanese Date plugin for CraftCMS 3.x

Converts a date string or date object to Japanese format, with the ability to calculate and display the Modern Japan Era name (Reiwa/令和, Heisei/平成, Showa/昭和, Taisho/大正, Meiji/明治).

## Examples

All examples can accept a year as a string or integer (eg. `"2018"` or `2018`), a date string (`"2018-12-25"`), or a date object (eg. `now`).

### Get object with era information
```twig
{{ craft.japaneseDate.era('2018') }} or 
{{ craft.japaneseDate.getEra('2018') }}
```

### Display Era

#### Kanji Name
```twig
{{ craft.japaneseDate.era('2018').kanji_name }} or 
{{ craft.japaneseDate.kanjiEra('2018') }} or 
{{ craft.japaneseDate.getKanjiEra('2018') }}
```

Outputs:

```
平成
```

#### Alphabetical Name
```twig
{{ craft.japaneseDate.era('2018').alpha_name }} or 
{{ craft.japaneseDate.alphaEra('2018') }} or 
{{ craft.japaneseDate.getAlphaEra('2018') }}
```

Outputs:

```
Heisei
```

#### Short Name
```twig
{{ craft.japaneseDate.era('2018').short_name }} or 
{{ craft.japaneseDate.shortEra('2018') }} or 
{{ craft.japaneseDate.getShortEra('2018') }}
```

Outputs:

```
H
```

### Display Year

```twig
{{ craft.japaneseDate.year('2018') }} or {{ craft.japaneseDate.getYear('2018') }}
```

Same as (alias of):

```twig
{{ craft.japaneseDate.era('2018') }}
```

#### Year in Kanji
```twig
{{ craft.japaneseDate.kanjiYear('2018') }} or 
{{ craft.japaneseDate.getKanjiYear('2018') }}
```

Outputs:

```
平成30年
```

Use `true` as a second parameter to use 元 for Year 1 of an era:

```twig
{{ craft.japaneseDate.kanjiYear('1989', true) }} or 
{{ craft.japaneseDate.getKanjiYear('1989', true) }}
```

Outputs:

```
平成元年
```

#### Year in Short Format
```twig
{{ craft.japaneseDate.shortYear('2018') }} or 
{{ craft.japaneseDate.getShortYear('2018') }}
```

Outputs:

```
H30
```

### Full Date
```twig
{{ craft.japaneseDate.date('2018-12-25') }} or 
{{ craft.japaneseDate.getDate('2018-12-25') }}
```

Outputs:

```
平成30年12月25日
```

Use `true` as a second parameter to use 元 for Year 1 of an era:

```twig
{{ craft.japaneseDate.date('1989-12-25', true) }} or 
{{ craft.japaneseDate.getDate('1989-12-25', true) }}
```

Outputs:

```
平成元年12月25日
```
