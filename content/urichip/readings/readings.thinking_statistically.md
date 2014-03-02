/*
author: john
title: Thinking Statistically
date: 2013-06-29
featured: true
wikipedia: http://en.wikipedia.org/wiki/
*/
[linkiframeAmazon asins=1481173502] 
### Thinking Statistically by Uri Bram

This was an easy quick read.  Read it complete on the train in two hours.  If you ever had a statistics class, then read it.  My statistics was so long ago, but the book was still easy to grasp.  It is not a in depth review of mathematics of statistics, but puts the concepts back in your head.

[[#ENDSUMMARY]]

Just 3 chapters really, three topics: [Selection Bias](#SelectionBias), [Endogeneity](#Endogeneity), and [Bayes Theorem](#Bayes).   You can simply jump to the end of the book and get the quick "**CODA**", but it only makes sense to me after reading the rest of the book.


## Selection Bias <a name="SelectionBias"></a>
__Taking a non random sample and treating it as if it was random.  Whether or not a particular piece of data arrives in your final sample is dependent on the value that datum would have taken.__

One example:  Everyone says a movie is great; however, folks that really don't care or thought it was bad movie may not be interested in saying anything; so you think all data is pointing to great. You really don;t have all the data, but think you do!

## Endogeneity <a name="Endogeneity"></a>
Now there is a complicated word!  Read about it on Wikipedia: [Endogeneity](%wikipedia%Endogeneity).

> In a statistical model, a parameter or variable is said to be endogenous when there is a correlation between the parameter or variable and the error term. Endogeneity can arise as a result of measurement error, autoregression with autocorrelated errors, simultaneity and omitted variables. Broadly, a loop of causality between the independent and dependent variables of a model leads to endogeneity.

All statistics have some error value.  When you say there is a 90% chance of rain tomorrow, you really mean 90% `+- some error value.   The trap is you use the error value to lump some unknown variables that may be correlated to the temperature itself.  So you have a problem.

Endogeneity problems are the root reason we always caution that __**correlation does not imply causation**__.

## Bayes Theorem <a name="Bayes"></a>

Basically this is conditional probability.  How do we update old beliefs based on new evidence.  Works great, but problem is people often forget to update the probabilities from different hypothesis too.

The **base rate** fallacy is an example of this.  See the Wikipedia article [[wikipedia::Base_rate_fallacy]]

> The base rate fallacy, also called base rate neglect or base rate bias, is an error that occurs when the conditional probability of some hypothesis H given some evidence E is assessed without taking into account the prior probability ("base rate") of H and the total probability of evidence E.

Suppose there are 1000 apples and we have a test to determine if it is a good apple or bad apple. Lets say the test has a 99% accuracy (my word).  If we know there are actually 100 bad apples.  Now run the test, how many bad apples will the test find?  Make sure you account for the full meaning of the test!

* The false negative rate: If the test scans a BAD apple, a bell will ring 99% of the time, and it will fail to ring 1% of the time.
* The false positive rate: If the test scans a GOOD apple, a bell will not ring 99% of the time, but it will ring 1% of the time.

So the results of this test says there are 99+9=108 bad apples.  That is about 10% and fairly close to the true amount of bad apples.  The test let 1 out of 100 bad apples through, but also forced 9 good apples to be thrown out too.  Maybe not so bad.

But this falls apart when the BASE RATES change.  Lets say we now have a million people and a test for predicting bank robbers.  Lets assume that for the million people there are actually only 100 bank robbers.  We also have a test that has the same 99% accuracy.  Lets test the million people.

So the results say there are 99+9999=10,0098 bank robbers.  The test found the 99 (out of 100) bank robbers, but it also put in jail 10,000 people who are not bank robbers!  

Need to be careful with base rates!  Need to be careful that you also include alternative hypothesis.

## For Equation Lovers
<embed mathjax>
`P(F|E)	= {P(E|F)P(F)}/{ P(E|F)P(F) + P(E|F')P(F')}`