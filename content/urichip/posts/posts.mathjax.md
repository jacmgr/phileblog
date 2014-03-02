/*
title: Using Mathematical Equations
~
author: jacmgr
~
date: 2013-06-26
*/

If you know [http://www.mathjax.org](MathJax) you know it allows you to render equations in an HTML page like this:

<embed mathjax>
<div style="font-size: 140%;">
<embed mathml.equation1>
</div>


It works well in Boltwire.  All you need to do is load in the javascript to the page where you want to use it (like this page!).  In Boltwire that means making a code page.
[[#ENDSUMMARY]]

I created a page named **code.embed.mathjax** with the following code...

~~~~
<script type="text/javascript"
src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
</script>
~~~~

Now in the page you want to use MATHJAX just enter the **embed function** in the page like this:

~~~~
<embed mathjax>
~~~~

Now the JS is loaded for this page.  MATHjax will search the HTML to find the MATHML or ASCIImathML codes and render them.


!!ASCIImathML
This lets you write the equations in type text and then MATHjax will render it.  This is a great pairing!
[http://math.chapman.edu/~jipsen/mathml/asciimathjax.html]()
[http://www1.chapman.edu/~jipsen/mathml/asciimathsyntax.html]()

Example: Solving the quadratic equation. In your real text page the quote (') here should be replaced by double back tick. In straight up ASCIImathML a single backtick is used as the delimeter; but for boltwire you need to add a second backtick.
Can't show that here, becuase if I do, MATHjax will process as script!
~~~~
Suppose 'ax^2+b x+c=0'  and 'a!=0'. We first divide by 'a' to get 'x^2+b/a x+c/a=0'. 

Then we complete the square and obtain 'x^2+b/a x+(b/(2a))^2-(b/(2a))^2+c/a=0'. 
The first three terms factor to give '(x+b/(2a))^2=(b^2)/(4a^2)-c/a'.
Now we take square roots on both sides and get 'x+b/(2a)=+-sqrt((b^2)/(4a^2)-c/a)'.

Finally we subtract 'b/(2a)' from both sides and simplify to get the two solutions: 
'x_(1,2)=(-b+-sqrt(b^2 - 4a c))/(2a)'
~~~~

**That text in your page PRODUCES**
<div class=box>

Example: Solving the quadratic equation.
Suppose``ax^2+b x+c=0``  and ``a!=0``. We first divide by ``a`` to get ``x^2+b/a x+c/a=0``. 

Then we complete the square and obtain ``x^2+b/a x+(b/(2a))^2-(b/(2a))^2+c/a=0``. 
The first three terms factor to give ``(x+b/(2a))^2=(b^2)/(4a^2)-c/a``.
Now we take square roots on both sides and get ``x+b/(2a)=+-sqrt((b^2)/(4a^2)-c/a)``.

Finally we subtract ``b/(2a)`` from both sides and simplify to get the two solutions: 
``x_(1,2)=(-b+-sqrt(b^2 - 4a c))/(2a)``
</div>

!!MathML
You make either MathML or LATEX standard equation files.

Then I found some fancy equations in MathML format.  I put one equation in one code file named **code.embed.mathml.equation1**. This is what it looks like:

<div class="code">
<math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
<mrow>
    <mi>σ</mi>
    <mo>=</mo>
    <msqrt>
      <mrow>
        <mfrac>
          <mrow>
            <mn>1</mn>
          </mrow>
          <mrow>
            <mi>N</mi>
          </mrow>
        </mfrac>
        <mstyle displaystyle="true">
          <mrow>
            <munderover>
              <mrow>
                <mo>∑</mo>
              </mrow>
              <mrow>
                <mi>i</mi>
                <mo>=</mo>
                <mn>1</mn>
              </mrow>
              <mrow>
                <mi>N</mi>
              </mrow>
            </munderover>
            <mrow>
              <msup>
                <mrow>
                  <mo stretchy="false">(</mo>
                  <msub>
                    <mrow>
                      <mi>x</mi>
                    </mrow>
                    <mrow>
                      <mi>i</mi>
                    </mrow>
                  </msub>
                  <mo>−</mo>
                  <mi>μ</mi>
                  <mo stretchy="false">)</mo>
                </mrow>
                <mrow>
                  <mn>2</mn>
                </mrow>
              </msup>
            </mrow>
          </mrow>
        </mstyle>
      </mrow>
    </msqrt>
    <mo>.</mo>
</mrow>
</math>
</div>

Then whenever I want to display that eqution I just put this on the page.  You only have to use the `<embed mathjax> once per page.

~~~~
<embed mathjax>
<div style="font-size: 200%;">
<embed mathml.equation1>
</div>
~~~~

!!And this is the result

<div style="font-size: 200%;">
<embed mathml.equation1>
</div>

And here is another one:
<div style="font-size: 200%;">
<embed mathml.equation2>
</div>

!!More ASCIImathMl

Don't forget, single quote should be double backtick

[t class="stripe table table-striped table-bordered table-condensed"]

[r][c]'x^2+y_1+z_12^34'[c]``x^2+y_1+z_12^34``[c]subscripts as in TeX, but numbers are treated as a unit

[r][c] 'sin^-1(x)' [c] ``sin^-1(x)`` [c]function names are treated as constants

[r][c]/= 'd/dxf(x)=lim_(h->0)(f(x+h)-f(x))/h' =/[c]/= ``d/dxf(x)=lim_(h->0)(f(x+h)-f(x))/h`` =/[c]complex subscripts are bracketed, displayed under lim 

[r][c]'f(x)=sum_(n=0)^oo(f^((n))(a))/(n!)(x-a)^n'[c]``f(x)=sum_(n=0)^oo(f^((n))(a))/(n!)(x-a)^n``[c](a) must be bracketed, else the numerator is only ``a`` 

[r][c]'int_0^1f(x)dx' [c]``int_0^1f(x)dx`` [c]subscripts must come before superscripts 

[r][c]/= '[[a,b],[c,d]]((n),(k))' =/[c]/=``[[a,b],[c,d]]((n),(k))`` =/[c]matrices and column vectors are simple to type 

[r][c]'x/x={(1,if x!=0),(text{undefined},if x=0):}' [c]``x/x={(1,if x!=0),(text{undefined},if x=0):}`` [c]piecewise defined functions are based on matrix notation 

[r][c]'a//b' [c]``a//b`` [c]use // for inline fractions 

[r][c]'(a/b)/(c/d)' [c]``(a/b)/(c/d)`` [c]with brackets, multiple fraction work as expected 

[r][c]'a/b/c/d' [c]``a/b/c/d`` [c]without brackets the parser chooses this particular expression 

[r][c]'((a*b))/c' [c]``((a*b))/c`` [c]only one level of brackets is removed; * gives standard product 

[r][c]'sqrt sqrt root3x' [c]``sqrt sqrt root3x`` [c]spaces are optional, only serve to split strings that should not match 

[r][c]'<`< a,b >`> and {:(x,y),(u,v):}' [c] ``<`< a,b >`> and {:(x,y),(u,v):}`` [c]angle brackets and invisible brackets 

[r][c]'(a,b]={x in RR | a < x <= b}' [c]``(a,b]={x in RR | a < x <= b}`` [c]grouping brackets don't have to match 

[r][c]'abc-123.45^-1.1' [c]``abc-123.45^-1.1`` [c]non-tokens are split into single characters, but decimal numbers are parsed with possible sign 

[r][c]'hat(ab) bar(xy) ulA vec v dotx ddot y' [c]``hat(ab) bar(xy) ulA vec v dotx ddot y`` [c]accents can be used on any expression (work well in IE) 

[r][c]'bb{AB3}.bbb(AB].cc(AB).fr{AB}.tt[AB].sf(AB)'[c]``bb{AB3}.bbb(AB].cc(AB).fr{AB}.tt[AB].sf(AB)`` [c]font commands; can use any brackets around argument 

[r][c]/= 'stackrel"def"= or \stackrel{\Delta}{=}" "("or ":=)' =/[c]/= ``stackrel"def"= or \stackrel{\Delta}{=}" "("or ":=)`` =/[c] symbols can be stacked 

[r][c]/= '{::}_(\ 92)^238U' =/[c]/= ``{::}_(\ 92)^238U`` =/ [c]prescripts simulated by subsuperscripts 

[t]
